# Data Flow: MyMI Price Forecaster

## Overview
The forecaster is triggered after trade alert normalization so it can enrich alerts with a deterministic forecast payload. Processing must be **non-blocking**, **cache-friendly**, and **re-runnable**.

## Pipeline stages
1. **Email Alert**
   * Incoming trade alert emails land in the `bf_investment_scraper` table.
2. **Scraper**
   * `bf_investment_scraper` entries are parsed and stored as normalized trade alerts.
3. **Symbol Extraction**
   * Symbols are extracted from email subject/body and validated against `bf_investment_tickers`.
4. **Trade Alert Record**
   * Normalized alerts are stored in `bf_investment_trade_alerts`.
5. **Forecast Engine (trigger)**
   * Forecast pipeline triggers after alert is stored/normalized.
   * Trigger point is asynchronous (queue/cron/event-driven) so alert processing does not block.
   * Forecast engine class: `app/Services/Forecasting/MyMIForecaster.php`
6. **Forecast Storage**
   * Forecast outputs are written to `bf_investment_price_forecasts` (new table).
7. **UI / Notifications**
   * Dashboards and alerting systems read forecasts for rendering and notification routing.

## Canonical flow

```
Email Alert
  → Scraper
  → Symbol Extraction
  → Trade Alert Record
  → Forecast Engine
  → Forecast Storage
  → UI / Notifications
```

## Existing alert processing logic (audit summary)
* Email alerts are processed by the MyMI alert pipeline and normalized into `bf_investment_trade_alerts`.
* The system already batches alert processing and market data refresh in `MyMIAlerts`.

### Recommended hook points
* **Primary hook:** Immediately after a trade alert is created/normalized and stored (post-normalization step) in:
  * `app/Models/AlertsModel::insertTradeAlert()`
  * `app/Models/AlertsModel::upsertOpenedTradeAlert()`
* **Secondary hook:** After `MyMIAlerts::processTradeAlertsInBatches()` completes updating price/volume for pending alerts (batch refresh context).

### Non-blocking requirement
* Forecasting should be queued or scheduled (CRON) to avoid delaying email ingestion or alert creation.

### Cache + rerun strategy
* Forecasts should be idempotent and re-runnable:
  * If a forecast exists within a configurable TTL window, reuse cached result.
  * Allow manual re-forecasting for specific alerts/tickers.
