# Social Distribution Playbook

## Pipeline Tables
- `bf_marketing_posts` / `bf_marketing_generated_posts` (drafts)
- Discord/notification queues (e.g., `bf_discord_queue` if enabled)

## Spark Commands
- `php spark marketing:automation-audit` (verify distribution hooks)

## Definition of Done
- Drafts are marked as queued or dispatched.
- Each channel has a dedupe key (post ID or hash).
- Distribution logs confirm status transitions.

## Dedupe Rules
- Use per-platform dedupe keys (post ID + channel).
- Prevent duplicate reposts within 24 hours unless explicitly configured.

## Rate Limiting / Pacing
- Discord: limit to 1–2 posts per minute per channel.
- LinkedIn: 1 post per 30–60 minutes.
- X (Twitter): 1 post per 5–10 minutes.
- Facebook: 1 post per 15–30 minutes.

## Platform Constraints
- Discord: 2000 character limit (truncate or split).
- LinkedIn: 3000 character max; keep under 1300 for best engagement.
- X (Twitter): 280 characters; include only one link + short hashtag list.
- Facebook: avoid auto-posting long threads; keep descriptions under 500 characters.
