# Advanced Forecasting Overview

## How the Systems Work Together
**Forecast Detail UI** provides explainability on a single forecast (direction, confidence, indicators, history).

**Confidence Heatmaps** surface conviction across many tickers/timeframes using cached aggregation.

**Forecast Accuracy Tracking** measures how forecasts perform over time and feeds analytics.

These systems are **independent but compatible**—each can ship on its own and relies on feature flags for safe rollout.

## User-Facing vs Internal
| Feature | User-facing | Internal |
| --- | --- | --- |
| Forecast Detail Modal | ✅ | — |
| Confidence Heatmap Widget | ✅ | — |
| Accuracy Evaluation Engine | — | ✅ (CRON) |
| Accuracy Panels | ✅ (read-only) | ✅ |

## Feature Flags & Safety
All three features are toggleable through `Config\MyMIForecasting`:
- `forecastDetailUi`
- `confidenceHeatmaps`
- `accuracyTracking`

UI components read cached data and fail gracefully when disabled or empty.

## Path to ML
1. **Explainability first** (Detail UI).
2. **Conviction maps** (Heatmaps) to guide user attention.
3. **Measured performance** (Accuracy Tracking) to calibrate confidence.
4. **ML Feedback Loop** using accuracy metrics to tune weights or inform future model training.
