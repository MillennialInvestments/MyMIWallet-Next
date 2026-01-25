# Forecast Accuracy Tracking

## Endpoints
- `GET /API/Investments/getForecastAccuracySummary?window=7d`
- CLI evaluation: `php spark forecasts:evaluate 100`

## Payload example
```json
{
  "window": "7d",
  "accuracyByTimeframe": [
    { "label": "5m", "hit_rate": 58.2, "hits": 120, "total": 206 }
  ],
  "accuracyByDirection": [
    { "label": "bullish", "hit_rate": 62.0, "hits": 90, "total": 145 }
  ],
  "rollingHitRate": { "7d": 58.2, "30d": 54.1 },
  "confidenceBuckets": [
    { "label": "70-84", "hit_rate": 66.4, "hits": 55, "total": 83 }
  ],
  "topTickers": [{ "label": "AAPL", "hit_rate": 72.1, "hits": 10, "total": 14 }],
  "worstTickers": [{ "label": "TSLA", "hit_rate": 31.2, "hits": 5, "total": 16 }],
  "lastEvaluatedAt": "2025-02-10 10:00:00"
}
```

## UI blocks where used
- Investments Dashboard: Accuracy tab (chart + tables).
- Executive Dashboard: Forecast Quality KPI card.

## Caching / performance expectations
- Cached for 120 seconds.
- Evaluations are appended-only in `bf_investment_forecast_accuracy`.

## Rule: no external calls from UI
Accuracy charts must only call the internal summary endpoint.
