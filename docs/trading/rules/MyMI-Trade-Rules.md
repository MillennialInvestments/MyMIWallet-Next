# MyMI Trade Rules

## Entry Qualification
- EMA alignment: EMA 3/8/13 stacked above EMA 34/48/70 for longs; inverse for shorts.
- VWAP position: Longs require price > VWAP; shorts require price < VWAP.
- Volume confirmation: Relative volume > 1.5 and up/down volume ratio aligned with direction.

## Momentum Validation
- RSI zones: Longs require RSI > 55; shorts require RSI < 45.
- MACD expansion: Histogram expanding in trade direction.
- ADX confirmation: ADX > 20 and rising.

## Risk Management
- ATR-based stops: Initial stop at 1.2x ATR from entry.
- Invalidation rules: Close beyond VWAP against position or EMA stack flip.

## No-Trade Conditions
- Low ADX below 18.
- EMA compression with overlapping fast/slow EMAs.
- VWAP chop with repeated crossovers.

<!-- TODO: Add script auto-exports for rules engine. -->
<!-- TODO: Add MyMI Wallet ingestion mapping for trade rule metadata. -->
<!-- TODO: Add JSON/YAML metadata layer for trade rules. -->
