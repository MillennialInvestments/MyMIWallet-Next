# Confidence Heatmaps

## Purpose
Confidence heatmaps surface **where conviction is strongest right now** across tickers, timeframes, and time windows. The UI is optimized for scanning strength rather than explaining a specific forecast.

## Aggregation Math
- **Input field:** `bf_investment_trade_alerts.forecast_confidence`
- **Aggregation:** average by `(ticker, timeframe)` within a rolling window.
- **Window filtering:** uses `forecast_updated_at` when available.

## Color Scale
| Confidence | Color |
| --- | --- |
| 0–40 | Red |
| 41–65 | Yellow |
| 66–100 | Green |

Tooltips show exact confidence values per cell.

## Performance Strategy
- Aggregation is performed server-side and cached.
- UI reads cached payloads only (no heavy joins in the browser).
- Cache keys include timeframe + window to keep queries stable.

## Cache TTLs
Default TTLs (configurable in `Config\MyMIForecasting`):
- `heatmap`: 300 seconds
- UI uses cached results and avoids refresh unless explicitly requested.

## Extension Ideas
- Add per-sector heatmap slices.
- Add confidence distributions per timeframe.
- Provide “refresh now” admin button tied to a CRON task.
