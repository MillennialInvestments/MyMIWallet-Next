# GT-NH-005 Ingress Contract

## Endpoint

`POST /API/Marketing/Ingress`

## Required headers

- `Content-Type: application/json`
- `X-MyMI-Source`
- `X-MyMI-Webhook-Key`
- `Idempotency-Key`

The webhook key is compared with `hash_equals()` and must never be
logged or persisted.

## Required payload fields

- `source_type`
- `source_name`
- `source_domain`
- `feed_url`
- `item_guid`
- `title`
- `summary`
- `canonical_url`
- `published_at`
- `retrieved_at`
- `author`
- `categories`
- `raw_payload_hash`

`raw_payload_hash` must be a 64-character SHA-256 hexadecimal value.

## Response contract

- `202` accepted
- `200` duplicate
- `400` malformed request
- `401` invalid webhook credential
- `403` ingress disabled or source disallowed
- `409` idempotency conflict
- `413` payload too large
- `415` unsupported media type
- `422` contract validation failure
- `429` rate limited
- `500` persistence failure
- `503` ingress protection unavailable

## Processing boundary

The endpoint validates, deduplicates, and stages inbound source data only.

It does not generate content, approve content, distribute content, invoke
Zapier, invoke Buffer, invoke Discord, or invoke AIOps/Ollama.
