# Analysis Modules

Each module is independent, deterministic, and contributes to overall confidence. Modules can be enabled/disabled via configuration.

## 1) Trend Analyzer
* **Inputs:** OHLC (multi-timeframe), moving averages, higher-high/lower-low detection.
* **Outputs:** Trend direction per timeframe, trend strength score (0–1).
* **Confidence contribution:** High (primary signal).
* **Required:** Yes.

## 2) Momentum Analyzer
* **Inputs:** RSI, MACD, rate-of-change, momentum over last N bars.
* **Outputs:** Momentum direction, overbought/oversold state, momentum strength.
* **Confidence contribution:** Medium.
* **Required:** Yes.

## 3) Volatility Analyzer
* **Inputs:** ATR, Bollinger Band width, intraday range.
* **Outputs:** Volatility state (low/medium/high), volatility trend.
* **Confidence contribution:** Medium.
* **Required:** Yes.

## 4) Support / Resistance Evaluator
* **Inputs:** Recent swing highs/lows, pivot zones, volume profile.
* **Outputs:** Nearest support/resistance levels and distance to price.
* **Confidence contribution:** Medium.
* **Required:** Optional (recommended when data depth is sufficient).

## 5) Mean Reversion Detector
* **Inputs:** Distance from moving averages, z-score, Bollinger deviation.
* **Outputs:** Reversion probability and pullback target zones.
* **Confidence contribution:** Low to Medium.
* **Required:** Optional.

## Module interface (v1)
All modules should return:
```json
{
  "module": "trend_analyzer",
  "required": true,
  "inputs": {"timeframes": ["5m", "15m", "1h", "4h", "1d"]},
  "output": {
    "signal": "bullish",
    "strength": 0.72
  },
  "confidence_delta": 12
}
```

## Storage
* Module outputs are serialized into `indicators_json` on `bf_investment_price_forecasts` for UI and audit access.
