# Communities Module Test Plan

## Template rendering
- Generate posts from each default template key and verify placeholders resolve.
- Assert platform-specific blocks (YouTube pinned comment, Discord markdown) are present.

## Character limit enforcement
- Provide oversized inputs and confirm SocialPostFormatter truncates to platform max.
- Validate thread splitting for X when body exceeds 240 chars.

## Hashtag limit tests
- Feed >10 hashtags and confirm formatter caps to platform limits.

## StockTwits ticker formatting
- Input tickers without `$` and ensure output includes `$TICKER`.

## Empty content safeguards
- Skip insert when hook/value is empty; expect error log and no DB write.

## Batch generation performance
- Run `generateDailyCommunityPosts` with `limit=5` and measure completion under expected SLA; ensure memory usage stays bounded.
