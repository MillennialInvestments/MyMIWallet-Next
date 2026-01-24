# Advanced Forecasting Overview

## Purpose
Defines the deterministic v1 forecasting stack used across dashboards, alerts, and forecasting utilities.

## Key components
- **Config**: `app/Config/MyMIForecasting.php` (timeframes, thresholds, evaluation windows, cache TTLs).
- **Data tables**:
  - `bf_investment_price_forecasts` (latest state per ticker/timeframe)
  - `bf_investment_forecast_history` (append-only snapshots)
  - `bf_investment_forecast_accuracy` (evaluation results)
  - `bf_investment_trade_alerts` denormalized fields
- **Services**:
  - `MyMIForecaster` (builds forecasts)
  - `ForecastAggregationService` (heatmaps + movers)
  - `ForecastAccuracyEvaluator` (accuracy evaluation + summaries)

## Endpoints
- `GET /API/Investments/getForecastHighlights`
- `GET /API/Investments/getForecastDetails/{ticker}`
- `GET /API/Investments/getConfidenceHeatmap?timeframe=5m&window=60`
- `GET /API/Investments/getForecastAccuracySummary?window=7d`
- `POST /API/Investments/reforecastTicker`

## Caching / performance
- Heatmaps cached for 60 seconds.
- Accuracy summaries cached for 120 seconds.
- Highlights cached via `MyMIForecaster`.
- Dashboards use denormalized forecast fields to avoid per-row external calls.

## UI blocks where used
- Executive Dashboard: forecast highlights + confidence heatmap cards.
- Investments Dashboard: heatmap panel, accuracy tab, forecast modal.

## Rule: no external calls from UI
All dashboard UI components must call internal `/API/Investments/*` endpoints only.
