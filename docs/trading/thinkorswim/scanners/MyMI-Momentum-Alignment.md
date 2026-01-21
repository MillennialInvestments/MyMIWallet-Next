# Momentum Alignment

## Platform
Thinkorswim

## Purpose
Finds symbols where price and momentum indicators align in the same direction for trend continuation setups.

## Logic Summary
Requires EMA stack alignment with ADX confirmation and price sustaining direction relative to VWAP.

## Conditions (Pseudo)
- EMA 3 > EMA 8 > EMA 13 > EMA 34
- Last > VWAP
- ADX (14) > 20
- MACD Histogram increasing
- RSI (14) > 55

## Intended Timeframes
- 1m
- 5m
- 15m
- Daily

## Best Used With
- MyMI – Momentum & Inflow Core (Thinkorswim Datapoint Group)
- MyMI Momentum Pressure (Study)

<!-- TODO: Add script auto-exports for Thinkorswim scanners. -->
<!-- TODO: Add MyMI Wallet ingestion mapping for scanner metadata. -->
<!-- TODO: Add JSON/YAML metadata layer for scanners. -->
