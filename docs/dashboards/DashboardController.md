# DashboardController

## Purpose
Provides the authenticated executive dashboard summary and supporting API payloads for the main dashboard experience. It hydrates the executive summary, onboarding status, and investment squeeze counts for the primary dashboard view. It also exposes an internal endpoint for forecast highlights used by the dashboard heatmap/highlights card.

## Data sources
- `MyMIDashboard::getExecutiveDashboardSummary()` for executive metrics and dashboard cards.
- `MyMIInvestments::getSqueezeHighRiskCount()` for squeeze-risk counts.
- `MarketingModel::getDailyDashboardNews()` for daily news cards.
- `AlertsModel` for same-day trade alerts.
- `MyMIAssistant` for AI session key + note payloads.
- `SetupStatusService` for onboarding status.
- `MyMIForecaster::getForecastHighlights()` for forecast highlight payloads.

## View responsibilities
- Renders `User/Dashboard/index` with all summary data.
- Passes `forecastHeatmapEnabled` and `forecastHeatmapDefaultTimeframe` flags used by the dashboard heatmap component.

## Endpoints invoked / served
- `DashboardController::index()` → GET `/dashboard` (or equivalent dashboard route).
- `DashboardController::getForecastHighlights()` → GET `/API/Investments/getForecastHighlights` (internal JSON for dashboard highlights).

## Performance notes
- Uses pre-aggregated dashboard data from `MyMIDashboard`.
- Forecast highlights are cached by `MyMIForecaster` (`cacheTtls['highlights']`).
- Denormalized forecast fields in `bf_investment_trade_alerts` remain the source-of-truth for dashboard highlights.

## Forecasting integration
- `getForecastHighlights()` calls `MyMIForecaster::getForecastHighlights()` and returns:
  - `bullish`, `bearish`, `recent` lists with `forecast_confidence`, `forecast_direction`, `forecast_updated_at`.
- `index()` sets:
  - `forecastHeatmapEnabled` (boolean)
  - `forecastHeatmapDefaultTimeframe` (`'5m'`)
