# MyMI Flow Momentum

## Platform
TradingView (Pine Script v5)

## Purpose
Combines VWAP positioning, EMA stack alignment, and momentum expansion into a single visual signal.

## Inputs
- VWAP Source (default: hlc3)
- EMA Fast Lengths (default: 3, 8, 13)
- EMA Slow Lengths (default: 34, 48, 70)
- RSI Length (default: 14)
- MACD Fast/Slow/Signal (default: 12/26/9)
- ADX Length (default: 14)

## Signals Generated
- Long: Price above VWAP with bullish EMA stack and RSI > 55 plus MACD expansion.
- Short: Price below VWAP with bearish EMA stack and RSI < 45 plus MACD expansion.
- Exit: Price crosses VWAP against position or MACD histogram fades.
- Reversal: EMA stack flips after momentum divergence.

## Best Timeframes
- 1m
- 5m
- 15m
- Daily

## Relation to MyMI Datapoint Group
Maps directly to VWAP, VWAP % Diff, EMA 3/8/13/34/48/70, RSI (14), MACD Histogram, Momentum, and ADX (14).

<!-- TODO: Add script auto-exports for TradingView indicators. -->
<!-- TODO: Add MyMI Wallet ingestion mapping for indicator metadata. -->
<!-- TODO: Add JSON/YAML metadata layer for indicators. -->
