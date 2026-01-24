# Forecast Detail UI

## UX Goals
- Provide explainable, transparent forecast reasoning (direction, confidence, target, range, indicators).
- Surface a quick narrative of *why* a forecast exists without forcing users into raw data tables.
- Show how forecasts evolve over time via a compact history timeline.
- Handle partial data gracefully (missing indicators, missing history, missing ranges).

## Data Contract

**Endpoint:** `GET /API/Investments/getForecastDetails/{ticker}`

**Response shape (partial data allowed):**
```json
{
  "ticker": "AAPL",
  "timeframes": {
    "5m": {
      "direction": "bullish",
      "confidence": 78,
      "target": 193.25,
      "range": [190.40, 195.10],
      "indicators": {
        "trend": { "bias": 1, "strength": 0.82 },
        "momentum": { "bias": 1, "rsi": 61.2 },
        "volatility": { "atr": 2.1 },
        "support": 188.40,
        "resistance": 196.20
      },
      "updated_at": "2026-03-10 12:10:00"
    }
  },
  "history": [
    {
      "recorded_at": "2026-03-10 11:55:00",
      "timeframe": "5m",
      "direction": "bullish",
      "confidence": 72,
      "target": 192.80,
      "range": [189.20, 194.90],
      "indicators": {}
    }
  ]
}
```

**Notes**
- `timeframes` is a keyed map to allow quick UI switching.
- `history` is capped to the last 10 records.
- `indicators` can be a partial object; UI should render whatever it gets.

## UI Structure
- **Header**
  - Ticker label.
  - Timeframe selector.
- **Direction + Confidence**
  - Direction badge with threshold-based color.
  - Confidence % label.
- **Target + Range**
  - Target value, range low/high, and a visual range bar with a target marker.
- **Indicator Breakdown**
  - List of indicators with lightweight bars/meters.
  - JSON fallbacks if the structure is unknown.
- **Forecast History**
  - Timeline (last 10) filtered by timeframe.

## Extension Ideas (ML Explanations)
- Add an “Explain this forecast” panel for model output.
- Show top contributing indicators with SHAP-style weights.
- Expand history to include regime labels (trend/mean-reversion).
- Include confidence intervals and scenario narratives for 1D+ horizons.
