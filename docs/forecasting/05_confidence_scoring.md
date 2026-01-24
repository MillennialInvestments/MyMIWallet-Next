# Confidence Scoring

## Purpose
Confidence communicates the reliability of the forecast based on signal alignment, data quality, and market conditions.

## Base confidence
* Start with a base of **50** (neutral).

## Boosts
* **Trend alignment** (+5 to +15)
  * Strong multi-timeframe trend agreement
* **Multi-timeframe agreement** (+5 to +10)
  * Short + long timeframe alignment
* **Repeated alert confirmations** (+3 to +8)
  * Multiple alerts for same ticker within a short window
* **High-volume confirmation** (+3 to +8)
  * Volume above rolling average

## Penalties
* **Choppy markets** (-5 to -15)
  * Volatility spikes without directional trend
* **Low volume** (-3 to -8)
* **Conflicting indicators** (-5 to -15)
  * Trend vs momentum disagreement
* **Insufficient data** (-10 to -20)
  * Missing timeframes or sparse history

## Normalization
* Output is clamped to **0–100**.
* Final score = clamp(base + boosts - penalties, 0, 100).

## Reporting fields
* `confidence_score`
* `confidence_factors` (JSON list of boosts/penalties and their deltas)
* `forecast_confidence` stored in `bf_investment_trade_alerts` for quick dashboard access.
