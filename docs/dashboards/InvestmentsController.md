# InvestmentsController

## Purpose
Drives the authenticated investments dashboard and forecast APIs. It prepares investment dashboard data, serves the forecast modal, and exposes internal APIs for heatmaps, forecast details, accuracy summaries, and manual reforecast actions.

## Data sources
- `InvestmentService::getInvestmentData()` for dashboard investment aggregates.
- `InvestmentPriceForecastModel` for latest forecasts.
- `InvestmentForecastHistoryModel` for forecast history snapshots.
- `InvestmentForecastAccuracyModel` for accuracy metrics.
- `ForecastAggregationService` for heatmap aggregation.
- `ForecastAccuracyEvaluator` for accuracy summaries.
- `MyMIForecaster` for forecast refresh and manual reforecast actions.
- `AlertsModel` for denormalized forecast updates.

## View responsibilities
- Renders `App\Modules\User\Views\Investments\index` with investment data.
- Serves `App\Modules\User\Views\Investments\forecast_modal` for modal details.

## Endpoints invoked / served
- `InvestmentsController::index()` → GET `/Investments`.
- `InvestmentsController::forecastModal()` → GET `/Investments/forecastModal/{ticker}`.
- `InvestmentsController::getForecastDetails()` → GET `/API/Investments/getForecastDetails/{ticker}`.
- `InvestmentsController::getConfidenceHeatmap()` → GET `/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60`.
- `InvestmentsController::getForecastAccuracySummary()` → GET `/API/Investments/getForecastAccuracySummary?window=7d`.
- `InvestmentsController::reforecastTicker()` → POST `/API/Investments/reforecastTicker`.

## Performance notes
- Heatmap + accuracy endpoints are cached (`cacheTtls['heatmap']`, `cacheTtls['accuracySummary']`).
- Forecast highlights and denormalized fields on `bf_investment_trade_alerts` are updated during reforecast.
- Batch forecast lookups use `InvestmentPriceForecastModel::getLatestForecastsForTickers()`.

## Forecasting integration
- `forecastModal()` uses `InvestmentPriceForecastModel`, `InvestmentForecastHistoryModel`, and `MyMIForecasting::confidenceThresholds`.
- `getForecastDetails()` returns:
  - `latest` forecasts grouped by timeframe with `indicators` parsed from `indicators_json`.
  - `history` snapshots (last 10 rows).
  - `accuracy` summary (`hit_rate`, `total`).
- `getConfidenceHeatmap()` returns:
  - `matrix` (ticker → timeframe → confidence/direction/updated_at).
  - `recommendedMovers` (`bullish`, `bearish`).
  - `confidenceDistribution` buckets.
- `getForecastAccuracySummary()` returns:
  - `accuracyByTimeframe`, `accuracyByDirection`.
  - `rollingHitRate` (`7d`, `30d`).
  - `confidenceBuckets`, `topTickers`, `worstTickers`, `lastEvaluatedAt`.
- `reforecastTicker()` calls `MyMIForecaster::forecastForTicker()` and updates denormalized fields:
  - `latest_forecast_id`, `forecast_direction`, `forecast_confidence`, `forecast_target_price`, `forecast_range_low`, `forecast_range_high`, `forecast_updated_at`.
