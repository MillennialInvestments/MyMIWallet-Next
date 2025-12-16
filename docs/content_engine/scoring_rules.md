# Scoring rules

Implemented in `app/Config/ContentEngine.php` and `app/Libraries/ContentEngine/ScannerScoringService.php`.

Weights (scaled to 100):
- Dollar volume (`dollar_vol_m`) → 40%
- Market cap (`market_cap_m`) → 20%
- Day % change (`mark_pct_change`) → 15%
- Above-average volume (`abvvol`) → 15%
- 5D % change (`pct_chng_5d`) → 10%

Caps (normalization ceilings):
- Dollar volume: 1,500M
- Market cap: 100,000M
- Day % change: 100%
- ABV: 1,000
- 5D %: 100%

Penalties:
- Market cap under 75M → -12 score
- Day % change above 80% → -5 score

Tiers:
- `tier1` ≥ 75
- `tier2` ≥ 55
- `tier3` ≥ 35
- else `avoid`

Recommended platforms per tier (stored on `bf_content_ideas.recommended_platforms_json`):
- Tier1: TradingView, StockTwits, TikTok, YouTube, Facebook, Discord
- Tier2: TradingView, StockTwits, Facebook, Discord
- Tier3: TradingView, StockTwits
- Avoid: none

Reasons are stored as an array of score statements on `reasons_json` for UI display.