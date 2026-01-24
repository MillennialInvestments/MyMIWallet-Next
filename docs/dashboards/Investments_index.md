# Investments Dashboard View (`index.php`)

## Purpose
Defines the investments dashboard layout, including the forecast intelligence heatmap, accuracy tab, and supporting investment panels.

## Data sources
- View data from `InvestmentsController::index()` (`userInvestments`, `investDashboard`, `userWatchlist`, etc.).
- Forecast endpoints:
  - `/API/Investments/getConfidenceHeatmap`
  - `/API/Investments/getForecastAccuracySummary`
  - `/API/Investments/reforecastTicker`
  - `/Investments/forecastModal/{ticker}`

## View responsibilities
- Renders investment overview cards, calendar, insights, and performance panels.
- Hosts the Forecast Intelligence block (heatmap + accuracy tab).
- Triggers forecast modal loading via `dynamicModalLoader()`.

## Endpoints invoked / served
- GET `/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60` for heatmap data.
- GET `/API/Investments/getForecastAccuracySummary?window=7d` for accuracy charts and tables.
- POST `/API/Investments/reforecastTicker` for manual refresh actions.
- GET `/Investments/forecastModal/{ticker}` for modal content.

## Performance notes
- Uses cached heatmap and accuracy endpoints (60s/120s TTL).
- All UI requests are internal (no per-row external API calls).

## Forecasting integration
- Heatmap table displays `confidence` and `direction` values per timeframe.
- Re-forecast button posts `ticker` and `timeframes` to refresh forecasts.
- Accuracy tab renders hit rate by timeframe, rolling hit rate, and top/worst tickers.
