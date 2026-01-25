# Forecast Detail UI

## Endpoints
- `GET /Investments/forecastModal/{ticker}` → modal HTML view.
- `GET /API/Investments/getForecastDetails/{ticker}` → JSON for dynamic consumption (optional).

## Payload example
```json
{
  "ticker": "AAPL",
  "latest": {
    "5m": {
      "forecast_direction": "bullish",
      "confidence_score": 78,
      "target_price": 204.5,
      "range_low": 201.1,
      "range_high": 206.8,
      "indicators": {
        "trend": { "ema9": 203.1, "ema21": 202.5, "bias": 1, "strength": 0.02 },
        "momentum": { "rsi": 58.2, "bias": 1, "strength": 0.16 },
        "volatility": { "atr": 1.02 },
        "support_resistance": { "support": 200.4, "resistance": 206.2 }
      }
    }
  },
  "history": [
    { "recorded_at": "2025-02-10 09:30:00", "timeframe": "5m", "confidence_score": 72 }
  ],
  "accuracy": { "hit_rate": 56.7, "total": 30 }
}
```

## UI blocks where used
- Investments Dashboard: modal opened via `dynamicModalLoader('/Investments/forecastModal/' + ticker)`.
- Dashboard Highlights card: quick-view modal entry.

## Caching / performance expectations
- Modal uses server-rendered HTML for immediate display.
- JSON endpoint is uncached; use it for optional enrichment only.

## Rule: no external calls from UI
All data for the modal must be sourced from internal endpoints.
