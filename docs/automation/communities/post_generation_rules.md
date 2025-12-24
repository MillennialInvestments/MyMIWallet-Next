# Post Generation Rules

- Respect platform char limits and hashtag caps (see docs/platform_formats/*).
- Always include CTA routing: Platform → Group/Community → Discord → Website → Free tools → Membership.
- Insert placeholders `{HOOK}`, `{VALUE}`, `{CTA}`, `{LINKS}`, `{HASHTAGS}`, `{TICKERS}` in templates.
- For StockTwits, enforce `$TICKER` formatting.
- For X, segment long content into thread-ready slices.
- For YouTube, include pinned comment block with CTA links.
- Save every variant to `bf_social_generated_posts` with status `draft` or `approved`.
- Log errors and truncation events for auditability.
