# Streaming Setup: Twitch & YouTube with MyMI Discord

This quickstart explains how live streams (e.g., Saturday Coffee & Stocks) connect to Discord and MyMI data.

## Where to announce streams
- Post go-live links in `#live-streams` with title, time, and topic.
- Pin the current week’s stream in `#live-streams` for easy discovery.
- Keep trade ideas and DD in their dedicated channels; link back if referenced during the stream.

## Using MyMI data during streams
- Pull alerts/news/earnings via `/mymi alerts`, `/mymi ticker`, `/mymi news`, `/mymi earnings` while live.
- Highlight budget/forecast or project updates as needed; direct viewers to `/Support/Discord` for onboarding.
- After the stream, post a brief recap or replay link in `#live-streams` (and optionally `#marketing-news`).

## Branding & overlays
- Include MyMI logo + URL in OBS/Prism overlays.
- Keep ticker callouts consistent with `$TICKER` notation used in Discord.
- If using on-screen chat, filter to the `#live-streams` channel to avoid clutter.

## Staging & testing
- Dry-run streaming alerts/posts in a staging server or `#staging-sandbox` before announcing widely.
- Validate webhooks that pipe marketing/earnings snippets into `#live-streams` for show prep.