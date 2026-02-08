# APIs Module Documentation

## Covered Files
- `app/Modules/APIs/Controllers/HealthController.php`
- `app/Modules/APIs/Controllers/OpsController.php`
- `app/Modules/APIs/Controllers/Webhooks/TradingViewController.php`

## Purpose
The APIs module exposes REST endpoints for system health, operations queue/report workflows, and inbound webhook ingestion.

## Inputs and Outputs
- **Inputs:** query parameters (`queue_id`, `limit`, `offset`), JSON bodies (`job_key`, `payload`, `report_markdown`), raw webhook body + headers (`X-Signature`, `Idempotency-Key`).
- **Outputs:** JSON responses with status payloads, queue/run metadata, report content, and webhook acceptance/denial states.

## Auth Requirements
- `HealthController::index()` and `HealthController::spark()` are unauthenticated health endpoints.
- `OpsController` methods require either admin authorization or a valid HMAC signature (`X-MyMI-Signature` + `X-MyMI-Timestamp`).
- `Webhooks/TradingViewController::ingest()` authenticates via `X-Signature` HMAC against `MYMI_WEBHOOK_SECRET_TRADINGVIEW`.

## Side Effects
- Reads report and status files from `WRITEPATH` and `docs/ops/reports`.
- Enqueues jobs, reads queue/runs, and updates run output text through model writes.
- Inserts inbound webhook records including payload body and signature status.

## Related Detailed Docs
- `docs/controllers/APIs/HealthController.md`
- `docs/controllers/APIs/OpsController.md`
- `docs/controllers/APIs/TradingViewController.md`
