# Forecasting Inputs

## Price & volume data
* **OHLCV** (open/high/low/close/volume)
* **Spread / range** (intraday high-low)
* **Volume profile** (absolute volume + relative to rolling average)
* **Source adapter:** `app/Services/Forecasting/Providers/AlphaVantageProvider.php`

## Required timeframes
* **5m**
* **15m**
* **1h**
* **4h**
* **Daily**

## Alert metadata
* **Alert type** (Buy, Sell, Liquidity, Breakout)
* **Occurrence count** (frequency of alert for ticker in last X hours/days)
* **Time since last alert**
* **Alert source** (scanner/email, strategy, manual, etc.)
* **Alert priority** (if present in metadata)

## Market context signals
* **Trend direction** (per timeframe)
* **Volatility state** (low / medium / high)
* **Momentum strength** (weak / neutral / strong)
* **Support / resistance levels** (recent swing points)

## Data dependencies & gaps
* **Ensure price history is available** for short and long windows (e.g., 50–200 bars).
* **Missing data handling** should gracefully fallback to higher timeframe or cached values.
* **Minimum viable input** for forecast:
  * Close prices for at least one intraday and one higher timeframe
  * Alert type and timestamp
