# Wallets Index Dashboard

_Last updated: 2025-09-07_

## Data Flow Overview

```text
Browser (/Wallets)
   │
   ├── WalletsController::index()
   │     ├── guardAuthenticated() → redirect to /login if no session
   │     ├── loadBudgetSnapshot()  → MyMIBudget::getUserBudget() (cache 60s)
   │     ├── loadSolanaSnapshot()  → MyMISolana::getUserSolana() (+ SolanaService failover)
   │     ├── loadAccountCollections() → AccountService model fetches (bank/credit/debt/etc)
   │     ├── loadWalletSummary()   → MyMIWallet::getWalletSummaries()
   │     └── buildFinancialSummary() via WalletSummaryCalculator
   │
   └── View themes/dashboard/... renders category tabs + dynamic modals
```

### Dependencies

* **Libraries**: `MyMIBudget`, `MyMIWallet`, `MyMISolana`
* **Services**: `AccountService`, `WalletService`, `WalletSummaryCalculator`, `SolanaService` (network status fallback)
* **Models**: `WalletModel`, downstream account/budget models accessed via services
* **Filters**: `login` (`app/Config/Routes.php`) guards `/Wallets`

## Caching Rules

| Layer           | Key Pattern                 | TTL  | Notes                              |
|-----------------|-----------------------------|------|------------------------------------|
| Budget snapshot | `wallets:budget:{userId}`   | 60s  | Stores full budget + formatted sums|
| Solana snapshot | In-memory per request       | req  | Network + wallet values            |
| Account sets    | In-memory per request       | req  | Bank/credit/debt/investment arrays |

Cache is bypassed automatically for guests (no user ID). Budget cache source is surfaced to the view in `financialSummary.source`.

## Error Handling Map

| Source           | Handler                                               | User Feedback                                |
|------------------|--------------------------------------------------------|----------------------------------------------|
| Budget library   | Logged (`WalletsController::loadBudgetSnapshot`)       | Falls back to zeros + `walletDataSources` flag|
| Solana service   | Logged (`WalletsController::loadSolanaSnapshot`)       | `solanaNetworkStatus.error` exposed for badge |
| Wallet model     | Logged (`WalletsController@index getUserWallets`)      | Empty wallet list rendered with CTA           |

All external/service failures degrade gracefully without breaking page render.

## API / Data Contracts

While `/Wallets` currently renders server-side, the controller prepares structured payloads for future JSON endpoints:

```json
{
  "financialSummary": {
    "values": {
      "netWorth": 0,
      "totalAssets": 0,
      "totalLiabilities": 0,
      "investableToday": 0,
      "creditAvailable": 0,
      "creditLimit": 0,
      "creditUtilization": 0,
      "breakdown": {
        "checking": 0,
        "investments": 0,
        "crypto": 0,
        "debt": 0
      }
    },
    "formatted": {"netWorth": "0.00", "breakdown": {"checking": "0.00"}},
    "source": "fresh",
    "asOf": "2025-09-06T00:00:00Z"
  },
  "walletDataSources": {
    "budget": {"generatedAt": "ISO8601", "source": "cache"},
    "solana": {"healthy": true, "error": null}
  },
  "accountCollections": {
    "bank": [],
    "credit": [],
    "crypto": [],
    "debt": [],
    "investment": []
  }
}
```

The budget payload now exposes both `debtSummary` (current balance) and `debtAvailable` (unused credit/offsets). Controllers and
views should prefer `debtSummary` for liability math to avoid under-reporting obligations.

These structures should be reused when exposing `/API/Wallets/summary` in a follow-up task.

## Adding a New Provider Checklist

1. Register provider metadata in `WalletModel::getProvidersByCategory()` (or supporting table).
2. Ensure relevant service/client is available (e.g., add new library under `app/Libraries`).
3. Extend `AccountService` and/or `WalletService` to normalize provider payloads.
4. Update Wallet views (`wallets_block.php`) to surface the provider CTA.
5. Add error handling + logging branch in controller or service wrapper.
6. Document provider-specific sync cadence and cache requirements here.

## Known Follow-ups

* JSON endpoints for summary/accounts/positions to hydrate the dashboard asynchronously.
* Client-side status badges consuming `walletDataSources` for “Live / Cached / Degraded” UI.
* Budget snapshot pre-warming CLI command for nightly cache hydration.