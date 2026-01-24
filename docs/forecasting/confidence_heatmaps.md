# Confidence Heatmaps

## Endpoint
`GET /API/Investments/getConfidenceHeatmap?timeframe=5m&window=60`

## Payload example
```json
{
  "timeframes": ["5m", "10m"],
  "primaryTimeframe": "5m",
  "matrix": [
    {
      "ticker": "AAPL",
      "timeframes": {
        "5m": { "confidence": 72, "direction": "bullish", "updated_at": "2025-02-10 09:30:00" },
        "10m": { "confidence": 64, "direction": "bullish", "updated_at": "2025-02-10 09:25:00" }
      }
    }
  ],
  "recommendedMovers": {
    "bullish": [{ "ticker": "AAPL", "confidence_score": 72 }],
    "bearish": [{ "ticker": "TSLA", "confidence_score": 75 }]
  },
  "confidenceDistribution": { "0-39": 2, "40-59": 4, "60-79": 6, "80-100": 1 }
}
```

## UI blocks where used
- Executive Dashboard: Confidence Heatmap card.
- Investments Dashboard: Heatmap tab.

## Caching / performance expectations
- Cached for 60 seconds.
- Uses batched forecast lookup (`getLatestForecastsForTickers`) to avoid per-row queries.

## Rule: no external calls from UI
Heatmap tables must only call this internal endpoint.
