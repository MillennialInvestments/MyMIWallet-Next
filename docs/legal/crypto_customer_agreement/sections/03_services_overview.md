# Services Overview

## What this means
Snapshot of the crypto capabilities you can access through MyMI Wallet today and what is planned.

## What we provide
- **Self-directed spot activity:** Tools to submit spot buy/sell or conversion requests on supported networks (currently centered on Solana) using your connected wallets or MyMI Gold credits when applicable.
- **Wallet connectivity:** Flows to link and manage self-custody wallets (Phantom, Solflare, MetaMask, Trust Wallet) for balance visibility and transactions.
- **Wallet transfers:** Ability to request sends/receives to on-chain addresses you supply, subject to security checks and network availability.
- **Fiat on/off-ramp support:** Funding and withdrawal options through supported payment rails (e.g., PayPal, Apple Pay) where available.
- **MyMI Gold/Coin usage:** Platform credit tools for rewards, settlements inside MyMI modules, and selected payment flows.

<!-- FEATURE:dex_swaps -->
## Planned: DEX swaps (commented)
- When enabled, we will expose swap routing (e.g., Jupiter/Raydium) with clear price-impact and slippage disclosures.
<!-- /FEATURE:dex_swaps -->

<!-- FEATURE:staking -->
## Planned: Staking (commented)
- When enabled, we will outline validator selection, lockups, reward timing, and slashing risk for supported assets.
<!-- /FEATURE:staking -->

<!-- FEATURE:margin -->
## Planned: Margin and leverage (commented)
- Not yet available. If added, we will require separate approvals and explicit risk acknowledgments.
<!-- /FEATURE:margin -->

<!-- FEATURE:derivatives -->
## Planned: Derivatives (commented)
- Not yet available. Any derivatives or perpetuals would carry distinct margin, liquidation, and eligibility rules.
<!-- /FEATURE:derivatives -->

<!-- FEATURE:lending_borrow -->
## Planned: Lending/Borrow (commented)
- Not yet available. If offered, collateral requirements, rehypothecation policies, and default procedures will be disclosed.
<!-- /FEATURE:lending_borrow -->

<!-- FEATURE:nft -->
## Planned: NFT tooling (commented)
- Not yet available. If added, royalty handling, metadata availability, and transfer limits will be documented.
<!-- /FEATURE:nft -->

<!-- FEATURE:api_trading -->
## Planned: API trading (commented)
- Not yet available. API keys, rate limits, and automation controls will be defined before launch.
<!-- /FEATURE:api_trading -->

## What you agree
- You initiate all crypto actions; MyMI does not provide discretionary management or investment advice.
- Availability depends on network health, partner status, and your completed verifications.

## Your responsibilities
- Confirm the right wallet, address, and network before submitting any transaction.
- Maintain updated wallets; ensure you can sign transactions where self-custody is required.
- Review live status banners for Solana or other networks before trading or transferring.

## Key limits & disclosures
- Service availability can change without notice during maintenance, outages, or compliance reviews.
- We may pause features (including transfers) if we detect risk, compliance flags, or network instability.
- No FDIC/SIPC coverage; crypto values can drop to zero.

<!-- INTERNAL:implementation-notes
- Solana connectivity: app/Services/SolanaService.php; app/Libraries/MyMISolana.php
- Wallet connectors: app/Libraries/MyMIPhantom.php; MyMISolflare.php; MyMIMetaMask.php; MyMITrustWallet.php
- Exchange flows & routing: app/Libraries/MyMIExchange.php; app/Modules/Exchange/Controllers/SolanaController.php; app/Services/JupiterService.php (swap routing)
- Fiat rails: app/Services/PayPalService.php; app/Services/ApplePayService.php
- Gold/Coin usage: app/Libraries/MyMIGold.php; app/Libraries/MyMICoin.php
-->
