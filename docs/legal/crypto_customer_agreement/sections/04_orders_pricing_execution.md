# Orders, Pricing & Execution

## What this means
How MyMI routes spot requests, sources prices, and handles execution timing.

## What we provide
- Self-directed order tools for supported assets; we do not provide recommendations.
- Pricing sourced from third-party market data (e.g., CoinGecko, Birdeye) and on-chain quotes where applicable.
- Disclosures of network fees, estimated totals, and any platform fees before you submit.
- Execution on a commercially reasonable efforts basis; we surface confirms or errors in-app.

## What you agree
- You understand on-chain execution depends on network conditions, liquidity, and your ability to sign/approve transactions.
- You accept that quoted prices may change until confirmed on-chain.
- You authorize MyMI to use reasonable routing (including partner venues) to complete your request.

## Your responsibilities
- Review quotes, fees, and slippage warnings before confirming.
- Monitor transaction status and retry only after checking for partial fills or pending network state.
- Use correct network and token mint addresses to avoid failed or misrouted requests.

## Key limits & disclosures
- We may cancel or reject orders for compliance reasons or if pricing becomes stale.
- Final settlement values are determined by the executed transaction, not the initial quote.
- Network congestion can delay inclusion; we do not control validator performance.

<!-- INTERNAL:implementation-notes
- Pricing sources: app/Services/CoinGeckoService.php; app/Services/BirdeyeService.php
- Routing/execution: app/Services/ExchangeService.php; app/Services/JupiterService.php (Solana swap quotes)
- Controllers: app/Modules/Exchange/Controllers/ExchangeController.php; app/Modules/Exchange/Controllers/SolanaController.php
-->
