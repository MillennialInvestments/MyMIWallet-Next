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

Platform recommendations by tier are read from `App\Config\ContentEngine::$recommendedPlatforms`.
