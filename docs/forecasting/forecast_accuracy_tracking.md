# Forecast Accuracy Tracking

## Goal
Measure how good forecasts are over time to evolve MyMI from opinion to measured intelligence.

## Definitions
- **Hit Target:** target price reached within the evaluation window.
- **MFE (Max Favorable Excursion):** best move in the forecast direction.
- **MAE (Max Adverse Excursion):** worst move against the forecast.

## Evaluation Windows
Default windows (minutes): 15, 30, 60, 240, 1440.

## Evaluation Flow
1. Forecasts are evaluated after the window elapses.
2. Price series is pulled for the same timeframe.
3. MFE/MAE are computed from candle highs/lows within the window.
4. Results are stored and **never overwritten**.

CRON entry:
```bash
php spark forecasts:evaluate
```

## Storage
Table: `bf_investment_forecast_accuracy`
- `forecast_id`, `ticker`, `timeframe`
- `forecast_direction`, `forecast_target`
- `actual_price`, `hit_target`
- `max_favorable_excursion`, `max_adverse_excursion`
- `evaluation_minutes`, `recorded_at`

## Bias Controls
- Separate evaluation windows prevent single-horizon bias.
- Directional hit rates and MFE/MAE are displayed separately.

## Future ML Feedback Loop
- Integrate accuracy outcomes into model weighting.
- Penalize signals with high MAE / low hit rates.
- Create per-market confidence calibration curves.
