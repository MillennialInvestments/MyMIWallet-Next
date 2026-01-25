# WalletsController

## Purpose
Handles wallet creation, wallet summaries, and wallet management views for authenticated users.

## Data sources
- `WalletModel`, `MyMIGoldModel` for wallet persistence.
- `WalletService`, `WalletSummaryCalculator`, `AccountService`, `CurrencyService` for summaries and conversions.
- `SolanaService` for blockchain wallet status.

## View responsibilities
- Renders wallet dashboards, wallet forms, and detail views.
- Supplies wallet summary data and Solana status to the views.

## Endpoints invoked / served
- Wallet dashboard routes under `/Wallets` and related wallet management endpoints.

## Performance notes
- Uses per-request cached aggregates to avoid duplicate wallet computations.
- Solana service resolution is cached per controller instance.

## Forecasting integration
- No direct forecasting integration in this controller.
- Forecasting data is handled in Investments and Dashboard flows.
