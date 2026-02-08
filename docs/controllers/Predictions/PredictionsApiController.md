# PredictionsApiController

**File path:** `app/Modules/Predictions/Controllers/API/PredictionsApiController.php`

## Purpose
API layer for predictions market listing, creation, ordering, and settlement via the `mymipredictions` service.

## Routes exposed
- `latest()` - returns placeholder latest predictions payload.
- `listMarkets()` - returns filtered market list.
- `createMarket()` - creates a market.
- `placeOrder()` - places an order.
- `cancelOrder()` - TODO placeholder.
- `settle($marketId)` - settles a market with winning option.
- `addLiquidity()` / `removeLiquidity()` - TODO placeholders.

## Auth requirements
- Inherits user context from `UserController`.
- Uses `service('auth')->id()` for write-path calls (`createMarket`, `placeOrder`, `settle`).

## Input validation
- `listMarkets()` only keeps non-empty filters.
- Write endpoints parse JSON body and pass validation responsibility to service layer; exceptions are logged and returned as validation errors.
- `settle()` casts route/input IDs to integers and accepts optional note.

## Side effects (DB, cache, queues)
- Delegates state changes to `service('mymipredictions')` methods (`createMarket`, `placeOrder`, `settleMarket`).
- Logs controller-level errors with `log_message()`.

## Related services/models
- `service('mymipredictions')`
- `service('auth')`
