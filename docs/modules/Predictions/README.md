# Predictions Module Documentation

## Covered Files
- `app/Modules/Predictions/Controllers/API/PredictionsApiController.php`

## Purpose
Exposes API endpoints for market listing, market creation, order placement, and settlement interactions through the predictions service.

## Inputs and Outputs
- **Inputs:** GET filters (`state`, `category`, `search`, `limit`, `mode`), JSON payloads for create/order/settlement actions, and route parameter `marketId` for settlement.
- **Outputs:** JSON API responses (`status`, `data`, `market_id`, validation error payloads).

## Auth Requirements
- Controller extends `UserController` and resolves current user via `service('auth')->id()` for state-changing actions.

## Side Effects
- Delegates write/read effects to `service('mymipredictions')` for create/order/settle operations.
- Logs errors on exceptions before returning validation failures.

## Related Detailed Docs
- `docs/controllers/Predictions/PredictionsApiController.md`
