# Dashboards

## Forecasting Enhancements
The following forecasting features are now available on dashboards (feature-flagged):

### Forecast Detail Modal
- Triggered by `dynamicModalLoader('/Investments/forecastModal/{ticker}')`.
- Shows direction, confidence, target/range, indicators, and forecast history.

### Confidence Heatmap Widget
- Main Dashboard: "Confidence Heatmap" card.
- Investments Dashboard: toggleable heatmap panel.
- Uses cached confidence aggregation only.

### Accuracy Panels
- Investments Dashboard tabs:
  - Rolling 7/30 day accuracy stats
  - Accuracy by timeframe
  - Accuracy by direction
  - Confidence vs accuracy correlation
