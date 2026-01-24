# MyMI Price Forecaster (Evaluation & Forecasting System)

## What it is
The **MyMI Price Forecaster** is an internal evaluation layer that analyzes incoming trade alerts and produces a structured forecast package (directional bias, price range, confidence score, and supporting indicator context). It transforms alert signals into consistent, comparable forecasts that can be stored, monitored, and surfaced in MyMI Wallet interfaces.

## Why it exists
* **Consistency:** Normalizes alert data into a unified forecast schema.
* **Signal strength clarity:** Adds objective trend/momentum/volatility context to alert signals.
* **Decision support:** Provides probability-driven guidance without creating trading actions.
* **Extensibility:** Creates a foundation for dashboards, Discord alerts, and automated summaries.

> **This system evaluates price direction and probability — it does not execute trades.**

## Integration overview
1. **Email → Scraper → Trade Alerts**
   * Trade alert emails are ingested by `bf_investment_scraper` and processed into normalized trade alert records.
2. **Forecast Engine**
   * Triggered after alert normalization (non-blocking) to compute forecasts for each alert/ticker.
3. **Market Data APIs**
   * Pulls OHLCV and indicator data from provider(s) (Alpha Vantage, Polygon, Finnhub, etc.) using configurable adapters.
4. **Storage & Downstream Outputs**
   * Forecasts are stored alongside alerts in a dedicated table and surfaced in dashboards, Discord alerts, and future automations.

## Primary outputs
* Directional bias: **Bullish / Bearish / Neutral**
* Forecasted price ranges (short/mid/long)
* Confidence score (0–100)
* Indicator context (trend/momentum/volatility summary)

## Implementation map (v1)
**Config**
* `app/Config/MyMIForecasting.php`

**Services**
* `app/Services/Forecasting/MyMIForecaster.php`
* `app/Services/Forecasting/MarketDataProviderInterface.php`
* `app/Services/Forecasting/Providers/AlphaVantageProvider.php`

**Models**
* `app/Models/InvestmentPriceForecastModel.php`
* `app/Models/InvestmentForecastHistoryModel.php`

**Migrations**
* `app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php`

**Commands**
* `php spark forecasts:refresh [limit]`

**Routes & Endpoints**
* `GET /API/Investments/getForecastHighlights`
* `POST /API/Investments/refreshForecasts` (admin)
* `POST /API/Investments/reforecastTicker` (admin)
* `GET /Investments/forecastModal/{ticker}`

## Non-goals (v1)
* No trade execution
* No portfolio actions
* No ML-based forecasting (explicitly deferred to v2+)
