# Forecasting Dashboard Integration

## Executive Dashboard
- **Heatmap card** uses `/API/Investments/getConfidenceHeatmap`.
- **Highlights card** uses `/API/Investments/getForecastHighlights`.
- **Forecast quality KPI** uses `/API/Investments/getForecastAccuracySummary?window=7d`.

## Investments Dashboard
- **Heatmap tab** uses `/API/Investments/getConfidenceHeatmap`.
- **Accuracy tab** uses `/API/Investments/getForecastAccuracySummary`.
- **Re-Forecast** action posts to `/API/Investments/reforecastTicker`.
- **Details modal** uses `/Investments/forecastModal/{ticker}`.

## Endpoints
- `GET /API/Investments/getForecastHighlights`
- `GET /API/Investments/getForecastDetails/{ticker}`
- `GET /API/Investments/getConfidenceHeatmap`
- `GET /API/Investments/getForecastAccuracySummary`
- `POST /API/Investments/reforecastTicker`

## Caching / performance expectations
- Heatmap: 60s TTL.
- Highlights: cached in `MyMIForecaster`.
- Accuracy summary: 120s TTL.

## Rule: no external calls from UI
All dashboard widgets must call internal API endpoints only.
