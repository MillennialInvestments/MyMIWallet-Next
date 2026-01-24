# UI & Dashboard Planning (No Build Yet)

## Forecast badge on trade alerts
* Badge appears in alerts list:
  * **Bullish / Bearish / Neutral**
  * Color-coded: green / red / gray
* Data source: `forecast_direction`, `forecast_confidence` on `bf_investment_trade_alerts`.

## Confidence visualization
* Confidence meter (0–100) with thresholds:
  * 0–49: Low
  * 50–69: Medium
  * 70+: High

## Forecast history per ticker
* Timeline panel with recent forecasts
* Compare forecast direction vs actual price moves (future metric)

## Tooltip / modal explanations
* Hover badge to show:
  * Summary of module signals
  * Confidence breakdown (boosts/penalties)
  * Timestamp of forecast

## Alert detail view
* Forecast card showing:
  * Direction bias
  * Short/mid/long targets
  * Price range
  * Confidence score
  * Indicator summary
* Actions:
  * “Re-Forecast” (POST `/API/Investments/reforecastTicker`)
  * “Details” (GET `/Investments/forecastModal/{ticker}`)

## Dashboard (Forecast Highlights card)
* Data source: `GET /API/Investments/getForecastHighlights`
* Sections:
  * Top Bullish (confidence >= 70)
  * Top Bearish (confidence >= 70)
  * Recently Updated (last 60 minutes)

## Example payload (highlights)
```json
{
  "bullish": [{"ticker": "AAPL", "forecast_confidence": 78}],
  "bearish": [{"ticker": "TSLA", "forecast_confidence": 74}],
  "recent": [{"ticker": "MSFT", "forecast_confidence": 61, "forecast_updated_at": "2026-03-10 12:32:00"}]
}
```
