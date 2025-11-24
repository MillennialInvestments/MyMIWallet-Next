# Earnings Calendar Automation

This note outlines how to surface earnings data in Discord on a weekly and daily basis.

## Data Sources
- **EarningsModel:** `MarketingController::upcomingEarnings()` relies on `EarningsModel::getUpcomingEarnings()` (backed by earnings calendar table/API such as Finnhub) to populate upcoming events.
- **User Context:** Cross-reference investor watchlists, active trade alerts, and marketing priorities to rank symbols.

## Weekly Post (Monday Morning)
- **Trigger:** CRON every Monday morning before market open.
- **Payload:**
  - Headline: "This Week’s Earnings to Watch"
  - Bullet list by day with symbol, company, and time (BMO/AMC) plus MyMI research links.
  - Highlight items on watchlists or with open alerts.
- **Destination:** `#earnings-watchlist` channel via webhook.

## Daily Post (Optional)
- **Trigger:** Each trading morning.
- **Payload:** "Today’s Earnings" with the same symbol/time format and quick notes (e.g., high IV, recent alert sentiment).
- **Destination:** `#daily-earnings` webhook.

## Candidate Pipeline
1. Fetch upcoming earnings (1–7 day window) from `EarningsModel`/API.
2. Filter/score symbols: prioritize those appearing in `bf_investment_trade_alerts` or user watchlists.
3. Render message using shared Discord template helper; truncate to 2000 characters.
4. Post via webhook and log success/failure for monitoring.

## Future Enhancements
- Attach lightweight charts or IV snapshots where available.
- Add reactions/polls for community sentiment on key earnings.
- Auto-follow-up post with actual results and price reaction for symbols that had pre-earnings alerts.