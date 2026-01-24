# Forecast Model (Deterministic v1)

## Goal
Combine multiple indicator modules into a deterministic forecast output that is explainable, configurable, and repeatable.

## Non-ML deterministic approach (v1)
* Forecast logic is **rules + weighted scoring** (no ML training yet).
* Each module produces a signal and a confidence delta.
* Scores are combined to produce **directional bias** and **target ranges**.

### Deterministic math (v1)
* **Trend:** EMA(9) vs EMA(21) + EMA(21) slope.
* **Momentum:** RSI(14) with 55/45 thresholds.
* **Volatility/Range:** ATR(14) used for range sizing.
* **Support/Resistance:** Donchian(20) for caps.
* **Score:** `wTrend * trend_bias + wMomentum * momentum_bias` → normalized [-1..+1].

## Signal combination
1. Normalize each module output to a standard scale.
2. Apply **config-driven weights** (e.g., trend=0.35, momentum=0.25, volatility=0.20, support/resistance=0.20).
3. Compute aggregate direction score:
   * Positive = bullish
   * Negative = bearish
   * Near zero = neutral
4. Generate targets and ranges per horizon (short/mid/long) using:
   * Trend direction
   * Volatility state
   * Support/resistance proximity

## Forecast outputs
* **Direction bias:** Bullish / Bearish / Neutral
* **Target price (short/mid/long):**
  * Short = 1–5 sessions
  * Mid = 1–3 weeks
  * Long = 1–3 months
* **Range (low/high):**
  * Anchored on ATR, volatility band width, and recent support/resistance
* **Confidence score (0–100):**
  * Derived from module confidence + signal alignment

## Example (pseudo)
```json
{
  "ticker": "AAPL",
  "direction": "bullish",
  "targets": {
    "short": 186.2,
    "mid": 192.5,
    "long": 205.0
  },
  "range": {
    "low": 182.0,
    "high": 198.0
  },
  "confidence": 71,
  "signal_summary": {
    "trend": "bullish",
    "momentum": "bullish",
    "volatility": "medium"
  }
}
```

## Configuration
* Weights and thresholds live in a configuration file or database table.
* This allows tuning without code changes.

## ML future note
* ML-based forecasting is explicitly deferred until historical forecast data and accuracy tracking exist.
