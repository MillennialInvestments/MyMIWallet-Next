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

# Scoring Rules

Scoring happens in `App\Libraries\ContentEngine\ScannerScoringService` and is mirrored here.

## Weights & Caps
- Dollar volume: weight 0.40, cap $1.5B notional (`dollar_vol_m`)
- Market cap: weight 0.20, cap $100B (`market_cap_m`)
- Day momentum: weight 0.15, cap 100% (`mark_pct_change`)
- Above-average volume: weight 0.15, cap 1000 (`abvvol`)
- 5-day change: weight 0.10, cap 100% (`pct_chng_5d`)

Scores are normalized to 0–100 using caps, then weighted.

## Penalties
- Microcap hit: `-12` if market cap < $75M
- Parabolic move hit: `-5` if day change > 80%

## Tiers
- **tier1**: score >= 75 (credible + liquid momentum)
- **tier2**: score >= 55 (liquid but riskier)
- **tier3**: score >= 35 (speculative short-form)
- **avoid**: below 35 or penalized heavily

## Reasons JSON
Each idea stores `reasons_json` with structured entries:
- Top 3 signals: `{type: 'signal', label, score, weight}`
- Penalties (if any): `{type: 'penalty', label, score, weight}`

Platform recommendations by tier are read from `Config\ContentEngine::$recommendedPlatforms`.