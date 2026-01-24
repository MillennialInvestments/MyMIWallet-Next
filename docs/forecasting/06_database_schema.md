# Database Schema Proposal

## New table: `bf_investment_price_forecasts`

| Field | Type | Notes |
| --- | --- | --- |
| id | BIGINT PK | Primary key |
| alert_id | BIGINT | FK to `bf_investment_trade_alerts.id` |
| ticker | VARCHAR(16) | Alert ticker |
| timeframe | VARCHAR(16) | `5m`, `10m`, `15m`, `1h`, `4h`, `1d` |
| forecast_direction | ENUM('bullish','bearish','neutral') | Direction bias |
| target_price | DECIMAL(16,6) | Target price |
| range_low | DECIMAL(16,6) | Lower bound |
| range_high | DECIMAL(16,6) | Upper bound |
| confidence_score | INT | 0–100 |
| signal_score | DECIMAL(10,4) | Combined signal score |
| indicators_json | LONGTEXT | Module outputs and indicator context |
| data_source | VARCHAR(32) | Provider tag (e.g., `alphavantage`) |
| created_at | DATETIME | Timestamp |
| updated_at | DATETIME | Timestamp |

## Append-only table: `bf_investment_forecast_history`

| Field | Type | Notes |
| --- | --- | --- |
| id | BIGINT PK | Primary key |
| forecast_id | BIGINT | FK to `bf_investment_price_forecasts.id` |
| ticker | VARCHAR(16) | Alert ticker |
| timeframe | VARCHAR(16) | Timeframe label |
| forecast_direction | ENUM('bullish','bearish','neutral') | Direction bias |
| target_price | DECIMAL(16,6) | Target price |
| range_low | DECIMAL(16,6) | Lower bound |
| range_high | DECIMAL(16,6) | Upper bound |
| confidence_score | INT | 0–100 |
| indicators_json | LONGTEXT | Module outputs and indicator context |
| recorded_at | DATETIME | Snapshot timestamp |

## Optional queue table: `bf_investment_forecast_jobs`

| Field | Type | Notes |
| --- | --- | --- |
| id | BIGINT PK | Primary key |
| alert_id | BIGINT | Alert ref |
| ticker | VARCHAR(16) | Ticker |
| status | VARCHAR(16) | `queued`, `running`, `success`, `failed` |
| attempts | INT | Retry count |
| run_after | DATETIME | Earliest run time |
| payload_json | LONGTEXT | Serialized job payload |
| created_at | DATETIME | Timestamp |
| updated_at | DATETIME | Timestamp |

## Additions to `bf_investment_trade_alerts`
* `latest_forecast_id` BIGINT NULL
* `forecast_confidence` INT NULL
* `forecast_direction` VARCHAR(16) NULL
* `forecast_target_price` DECIMAL(16,6) NULL
* `forecast_range_low` DECIMAL(16,6) NULL
* `forecast_range_high` DECIMAL(16,6) NULL
* `forecast_updated_at` DATETIME NULL

## Index suggestions
* `(ticker, timeframe)` on `bf_investment_price_forecasts`
* `(alert_id)` and `(created_at)` on `bf_investment_price_forecasts`
* `(forecast_id)`, `(ticker)` on `bf_investment_forecast_history`

## `indicators_json` schema (v1)
```json
{
  "trend": {
    "ema9": 184.2,
    "ema21": 182.6,
    "slope": 1,
    "bias": 1,
    "strength": 0.45
  },
  "momentum": {
    "rsi": 58.4,
    "bias": 1,
    "strength": 0.17
  },
  "volatility": {
    "atr": 2.11
  },
  "range": {
    "low": 180.0,
    "high": 187.4
  },
  "support_resistance": {
    "support": 178.2,
    "resistance": 189.1
  },
  "source": "alphavantage"
}
```
