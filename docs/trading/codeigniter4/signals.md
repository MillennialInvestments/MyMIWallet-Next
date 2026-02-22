# Signals

Implemented from ThinkOrSwim + TradingView references with deterministic latest completed bar evaluation.

Indicators:
- EMA(3,8,13,55)
- VWAP (intraday cumulative TP*V / cumulative V; daily fallback to TP)
- ATR14
- Vol SMA20

Liquidity engine:
- Pivot-confirmed levels where feasible.
- Fallback to rolling highest/lowest (`liqLength`) proxy.
- Merge threshold: `ATR14 * liqMergeATR`.

Events:
- `LIQ_BREAK`:
  - LONG when `high > lastLiqHigh`
  - SHORT when `low < lastLiqLow`
- `LIQ_SWEEP`:
  - bearish sweep when `high > lastLiqHigh && close < lastLiqHigh`
  - bullish sweep when `low < lastLiqLow && close > lastLiqLow`
- `SHIFT`: sweep + displacement + EMA/VWAP bias.
- `H_SHIFT`: strong displacement + vol expansion + EMA flip + spread contracting.
