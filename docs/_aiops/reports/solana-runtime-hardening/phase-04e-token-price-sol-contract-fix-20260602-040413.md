# Solana Runtime Hardening - Phase 04E getTokenPrice SOL Contract Fix

Generated UTC: Tue Jun  2 04:04:13 AM UTC 2026

## Problem

Browser endpoint validation showed:

```text
/index.php/API/Solana/getTokenPrice/SOL => {"error":"Unable to fetch token price from all sources"}
```

while these worked:

```text
/index.php/API/Solana/getMarketPrice => {"price":80.82}
/index.php/API/Solana/getExchangePrice/SOL => {"price":80.82}
```

## Fix

Updated `SolanaAPIController::getTokenPrice()` so `SOL` and `SOLANA` route through native SOL market-price fallback logic instead of being treated only as SPL token addresses.

## Marker

- MYMI_SOLANA_API_TOKEN_PRICE_SOL_FALLBACK_20260602

## File

- app/Modules/APIs/Controllers/SolanaAPIController.php
