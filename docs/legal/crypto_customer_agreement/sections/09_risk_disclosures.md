# Risk Disclosures

## What this means
Crypto involves material risks; this section highlights key ones.

## What we provide
- Status indicators for network health (especially Solana) where available.
- Notices when we pause services due to volatility, forks, maintenance, or partner outages.
- Educational prompts about address accuracy, slippage, and irreversible transfers.

## What you agree
- You understand crypto prices are volatile and may drop to zero.
- You accept that forks, airdrops, or unsupported assets may not be delivered or supported.
- You accept service interruptions during maintenance, outages, or risk events.

## Your responsibilities
- Monitor market conditions and network status before transacting.
- Back up wallets and keep enough funds for network fees and potential retries.
- Review any fork or airdrop announcements and understand that unsupported assets may not be credited.

## Key limits & disclosures
- MyMI does not control underlying blockchains, validators, or miners.
- Service downtime (planned or unplanned) may block trading or transfers temporarily.
- Unsupported forked assets, spam tokens, or malicious contracts may be blocked or discarded.

<!-- INTERNAL:implementation-notes
- Network status: app/Services/SolanaService.php (health checks); app/Libraries/MyMISolana.php (network status reporting)
- Outage/maintenance flags: app/Modules/User/Controllers/WalletsController.php (status badges); app/Modules/Exchange/Controllers/SolanaController.php (error surfaces)
- Market data: app/Services/CoinGeckoService.php; app/Services/BirdeyeService.php
-->
