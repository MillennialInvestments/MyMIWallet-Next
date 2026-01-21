# MyMI Momentum Pressure

## Platform
Thinkorswim

## Type
Lower

## Purpose
Tracks momentum expansion and contraction using RSI, MACD histogram, and ADX.

## Inputs
- RSI Length (default: 14)
- MACD Fast Length (default: 12)
- MACD Slow Length (default: 26)
- MACD Signal Length (default: 9)
- ADX Length (default: 14)

## Visual Output
- RSI line with 50 midline and 55/45 momentum bands
- MACD histogram bars colored by expansion direction
- ADX line with 20 trend threshold

## Trade Signals
- Entry logic: RSI > 55, MACD histogram expanding, ADX rising above 20.
- Exit logic: RSI falls below 50 or MACD histogram flips negative.
- Warnings: Momentum spikes can fade quickly on low volume.

## Notes
- Use with volume confirmation to avoid false positives.
- ADX lag can delay early entries.

<!-- TODO: Add script auto-exports for Thinkorswim studies. -->
<!-- TODO: Add MyMI Wallet ingestion mapping for study metadata. -->
<!-- TODO: Add JSON/YAML metadata layer for studies. -->
