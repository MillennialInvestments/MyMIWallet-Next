# GT-NH-005 Zapier Handoff

## Zap

`Zap MyMI 01`

The Zap must remain disabled during repository implementation and review.

## Webhook action

Method:

`POST`

URL:

`https://www.mymiwallet.com/API/Marketing/Ingress`

Headers:

- `Content-Type: application/json`
- `X-MyMI-Source: rss-by-zapier`
- `X-MyMI-Webhook-Key: <production secret>`
- `Idempotency-Key: <stable feed item identity>`

Recommended idempotency source:

`SHA-256(feed_url + "|" + item_guid)`

## Payload mapping

Map all required GT-NH-005 contract fields. Compute `raw_payload_hash` from
the normalized source item before submission.

## Activation gates

Zap MyMI 01 may be activated only after:

1. PR merge and deployment approval.
2. Production migration approval and successful migration.
3. Production webhook secret installation.
4. Disabled-route smoke.
5. Authorized live contract test.
6. Duplicate/idempotency test.
7. Owner approval to enable the feature flag.
