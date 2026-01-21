# MyMI VWAP EMA Stack

## Platform
Thinkorswim

## Type
Overlay

## Purpose
Displays VWAP with a multi-EMA stack to visualize trend alignment and decision zones.

## Inputs
- VWAP Source (default: Typical Price)
- EMA Fast 1 (default: 3)
- EMA Fast 2 (default: 8)
- EMA Fast 3 (default: 13)
- EMA Slow 1 (default: 34)
- EMA Slow 2 (default: 48)
- EMA Slow 3 (default: 70)

## Visual Output
- VWAP line in neutral color
- Fast EMAs in bright hues to show momentum alignment
- Slow EMAs in muted hues to show trend baseline
- Optional label indicating bullish or bearish stack state

## Trade Signals
- Entry logic: Price above VWAP with fast EMAs stacked above slow EMAs.
- Exit logic: Price closes back below VWAP or fast EMAs cross below slow EMAs.
- Warnings: Avoid signals during EMA compression or when VWAP slope is flat.

## Notes
- EMA stacking lags during high volatility transitions.
- Not designed to predict reversals without volume confirmation.

<!-- TODO: Add script auto-exports for Thinkorswim studies. -->
<!-- TODO: Add MyMI Wallet ingestion mapping for study metadata. -->
<!-- TODO: Add JSON/YAML metadata layer for studies. -->
