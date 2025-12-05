# Premium Flows & Upsell Playbooks

Map MyMI subscription tiers to Discord roles and channels, and outline automated upsell flows that keep free users aware of premium value.

## Plan → Role → Channel map

| Plan | Discord Role | Key Channels Unlocked |
| --- | --- | --- |
| Free | `Free` | #free-alerts, #general, #education-basics |
| Basic | `Basic` | + #trade-alerts-tier1, #liquidity-scans-basic |
| Premium | `Premium` | + #liquidity-scans, #ultron-signals, #earnings |
| Gold | `Gold` | + VIP voice, 1:1 Q&A, early beta features |

Nightly sync task: read MyMI subscription levels and update Discord roles using the Bot API or via a queue that a Python worker consumes.

## Automated upsell flows
- **Free channel activity → premium CTA:** When a user is active in `#free-alerts` without the Premium role, queue a periodic message: “You’re seeing just a slice of our signals. Upgrade to Premium to unlock Liquidity Scans & Ultron alerts.”
- **Weekly recap in #announcements:** Summarize premium wins: “This week: X premium alerts hit target, Y news events summarized. Click here to upgrade.”
- **Digest follow-up:** Include a “View this alert in your dashboard” deep link and an “Upgrade for full entry/exit levels” CTA in free previews.

## Template guidelines for CTAs
- Link to MyMI Wallet signup or upgrade flows: `https://www.mymiwallet.com/`.
- Include dashboard deep links when available (user-specific URLs preferred).
- Keep messages concise (<2000 chars) and emoji-friendly.
- Use `MyMIDiscord::enqueuePlain()` or templated `dispatch()` calls to target free channels with upgrade prompts.

## Operational notes
- Store role IDs in `config('Discord')->rolePlanMap` or `DISCORD_ROLE_PLAN_MAP`.
- Log role sync results (new table suggestion: `discord_role_sync_logs`) and surface failures in the `ops` channel.
- Respect quiet hours and pacing when sending upsell CTAs; use digest-style batching when possible.
