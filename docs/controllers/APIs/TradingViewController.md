# TradingViewController

**File path:** `app/Modules/APIs/Controllers/Webhooks/TradingViewController.php`

## Purpose
Webhook ingress endpoint for TradingView payloads with HMAC signature verification and idempotency dedupe.

## Routes exposed
- `ingest()` - accepts webhook body, validates signature, stores inbound event, and returns accepted/deduped/unauthorized result.

## Auth requirements
- HMAC verification via `X-Signature` against `MYMI_WEBHOOK_SECRET_TRADINGVIEW`.

## Input validation
- Accepts raw request body.
- Optional `Idempotency-Key` header is used to dedupe repeated events.
- Signature compared with `hash_equals`; invalid signatures marked and rejected.

## Side effects (DB, cache, queues)
- Reads existing webhook row for idempotency checks.
- Inserts inbound webhook records in `InboundWebhookModel` with payload body and status (`received` or `invalid_sig`).
- No queue writes in this file.

## Related services/models
- `App\Models\InboundWebhookModel`
