# Integration Points

## AlertsController integration
* Forecast trigger is wired after alert normalization.
* Primary hook methods:
  * `app/Models/AlertsModel::insertTradeAlert()`
  * `app/Models/AlertsModel::upsertOpenedTradeAlert()`

## CRON-based processing
* CLI command: `php spark forecasts:refresh [limit]`
* Scheduled job processes open alerts in batches.

## Manual re-forecasting
* API endpoint: `POST /API/Investments/reforecastTicker`
  * payload: `ticker=AAPL&timeframes=5m,10m`
* Triggered from UI “Re-Forecast” action.

## Dashboard visualization hooks
* Forecast Highlights card powered by `GET /API/Investments/getForecastHighlights`
* Alert detail pages read the `forecast_*` fields from `bf_investment_trade_alerts`.
* Forecast modal: `GET /Investments/forecastModal/{ticker}`

## Discord / social notification eligibility
* Forecasts can be used to determine whether alerts are distributed:
  * e.g., only send to Discord if confidence >= 70

## Non-blocking workflow
* Forecast engine runs async after alert creation if `forecasting.runInline = false`.
* Queue table: `bf_investment_forecast_jobs`.
* Config file: `app/Config/MyMIForecasting.php`
