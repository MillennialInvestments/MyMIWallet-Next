# Predictions Module Overview

The Predictions module brings Robinhood-style markets to MyMI Wallet with support for MyMI Gold staking, multi-asset routing (behind feature flags), and settlement tooling for administrators and liquidity providers.

## Configuration

- **Config file**: `app/Config/Predictions.php`
  - Toggle module availability with `$enabled` or the `.env` key `predictions.enabled`.
  - Choose the default currency mode (`GOLD_CENTRIC` or `MULTI_ASSET`).
  - Adjust fee bips, maximum stake, and liquidity controls.
- **Environment keys** (`.env`):
  ```ini
  predictions.enabled=true
  predictions.defaultMode=GOLD_CENTRIC
  predictions.multiAssetEnabled=false
  ```
- **Service locator**: resolve the orchestrator with `service('mymipredictions')`.

## Database

Run the CI4 migrations to create the predictions schema:

| Migration | Purpose |
| --- | --- |
| `2025-09-09-000010_CreatePredictionsMarkets` | Market metadata, life-cycle timestamps, category state |
| `2025-09-09-000020_CreatePredictionsOptions` | Market outcomes with odds/liquidity |
| `2025-09-09-000030_CreatePredictionsOrders` | User orders (stake, fees, payout expectations) |
| `2025-09-09-000040_CreatePredictionsTrades` | Execution fills and fee accounting |
| `2025-09-09-000050_CreatePredictionsPositions` | Aggregated user positions per outcome |
| `2025-09-09-000060_CreatePredictionsLiquidity` | Liquidity provider stakes |
| `2025-09-09-000070_CreatePredictionsSettlementsPayouts` | Resolver records and payout queue |

Use `php spark migrate` to apply pending migrations locally.

## Library Usage

```php
$predictions = service('mymipredictions');

// List live markets (supports optional filters)
$markets = $predictions->listMarkets([
    'state'  => 'OPEN',
    'search' => 'bitcoin',
]);

// Create a market (admin/oracle context)
$marketId = $predictions->createMarket([
    'title'       => 'Will BTC close above $70k this week?',
    'category'    => 'Crypto',
    'lock_at'     => '2025-10-01 15:00:00',
    'options'     => ['Yes', 'No'],
], $adminUserId);

// Place an order (handles eligibility + staking)
$result = $predictions->placeOrder([
    'market_id'    => $marketId,
    'option_id'    => 1,
    'stake_amount' => 25,
    'stake_asset'  => 'MIMG',
], $userId);
```

## HTTP Interfaces

### Routes

- **User UI** (`app/Config/Routes.php`)
  - `GET /Predictions/Markets` — now ships with search, state, and mode filters.
  - `GET /Predictions/Market/{id}` — market detail + options overview.
- **API** (`/API/Predictions`)
  - `GET /markets?state=&category=&search=&limit=&mode=` — filtered discovery feed.
  - `POST /markets/create` — create a market (admin/oracle).
  - `POST /orders/place` — stake into an option (Gold-centric conversion handled internally).
  - `POST /settle/{marketId}` — resolve winning option and queue payouts.

Both controllers now surface validation feedback (HTTP 422) when payloads are incomplete or eligibility checks fail.

## Settlements & Payouts

`MyMIPredictions::settleMarket()` ensures:

1. Winning option belongs to the market.
2. Market transitions to `RESOLVED` with audit timestamps.
3. Winning positions enqueue payouts (MyMI Gold credit with graceful fallbacks).

Run `service('mymipredictions')->processPayout($id)` inside CRON jobs to push pending payouts onto the ledger.

## Admin & CRON Notes

- Add CRON tasks for:
  - Locking markets: transition `OPEN` → `LOCKED` when `lock_at` has passed.
  - Processing payouts: iterate `bf_predictions_payouts` where `status='PENDING'`.
- Log context (memory/time) for CRON batches to match platform standards.

## Testing Checklist

1. `php -l` the updated library and controllers.
2. `php spark routes` (optional) to confirm endpoints are registered.
3. Exercise the API using `php spark serve` + REST client or `curl` to validate new validation errors.
4. Verify database writes through `MySQL` or CI4 debug toolbar when placing sample orders.

## Release Notes

- Added richer validation and gold-ledger fallbacks to prevent fatal errors when MyMIGold ledger helpers are missing.
- Surfaced discovery filters on UI + API so admins can triage markets faster.
- Documented module setup, migrations, and CRON responsibilities for onboarding.
