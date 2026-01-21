# Inflow Surge

## Platform
Thinkorswim

## Purpose
Detects symbols with sudden institutional inflow characterized by volume expansion and price holding above VWAP.

## Logic Summary
Looks for high relative volume, positive price change, and price above VWAP with supportive momentum.

## Conditions (Pseudo)
- Relative Volume > 1.8
- Last > VWAP
- % Change > 1.0
- RSI (14) > 55
- MACD Histogram > 0

## Intended Timeframes
- 1m
- 5m
- 15m
- Daily

## Best Used With
- MyMI – Momentum & Inflow Core (Thinkorswim Datapoint Group)
- MyMI VWAP EMA Stack (Study)

<!-- TODO: Add script auto-exports for Thinkorswim scanners. -->
<!-- TODO: Add MyMI Wallet ingestion mapping for scanner metadata. -->
<!-- TODO: Add JSON/YAML metadata layer for scanners. -->
