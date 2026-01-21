# MyMI – Momentum & Inflow Core (Thinkorswim Datapoint Group)

## Purpose
Identify real-time institutional inflows, confirm momentum alignment, and highlight decision zones for high-probability entries.

## Datapoints Included
### Price & Structure
- Last
- % Change
- Open
- High
- Low
- VWAP
- VWAP % Diff

### EMA Stack
- EMA 3
- EMA 8
- EMA 13
- EMA 34
- EMA 48
- EMA 70

### Volume & Money Flow
- Volume
- Avg Volume
- Relative Volume
- Up Volume
- Down Volume
- Up/Down Volume Ratio

### Momentum
- RSI (14)
- MACD Histogram
- Momentum
- ADX (14)

### Volatility & Risk
- ATR (14)
- True Range
- ATR % of Price

### Key Levels
- Previous Close
- Day High
- Day Low
- 52W High
- 52W Low

## Interpretation Rules
- Bullish alignment rules: Price above VWAP, EMA 3/8/13 stacked above EMA 34/48/70, RSI > 55, MACD histogram expanding positive, and ADX rising above 20.
- Bearish alignment rules: Price below VWAP, EMA 3/8/13 stacked below EMA 34/48/70, RSI < 45, MACD histogram expanding negative, and ADX rising above 20.
- Chop / no-trade conditions: Price oscillating around VWAP, EMA compression/flat stack, RSI 45–55, and ADX < 18.

## Sorting & Usage
- Recommended sort order: Relative Volume (desc), VWAP % Diff (desc), ADX (desc), then % Change (desc).
- When to avoid trades: Low relative volume, conflicting EMA stack, and price trapped between day high/low mid-range.

<!-- TODO: Add script auto-exports for datapoint group definitions. -->
<!-- TODO: Add MyMI Wallet ingestion mapping for datapoint group metadata. -->
<!-- TODO: Add JSON/YAML metadata layer for datapoint groups. -->
