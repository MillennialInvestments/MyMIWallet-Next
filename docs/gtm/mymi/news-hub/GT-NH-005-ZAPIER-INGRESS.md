# GT-NH-005 — Authenticated Zapier Marketing Ingress

## Purpose

Provide a disabled-by-default authenticated intake gateway for RSS
and financial-news records submitted from Zapier into MyMI Wallet.

## Endpoint

`POST /API/Marketing/Ingress`

## Required headers

- `Content-Type: application/json`
- `X-MyMI-Source: rss-by-zapier`
- `X-MyMI-Webhook-Key: <secret>`
- `Idempotency-Key: <stable unique key>`

## Required JSON fields

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

## Safety boundary

This endpoint only validates, deduplicates, and stages controlled
source records.

It does not summarize, generate, approve, queue, publish, call
Zapier, or activate Zap MyMI 01.

## Configuration

    MARKETING_ZAPIER_INGRESS_ENABLED=0
    MARKETING_ZAPIER_WEBHOOK_KEY=
    MARKETING_ZAPIER_CONTRACT_TEST_ENABLED=0
    MARKETING_ZAPIER_INGRESS_RATE_LIMIT=60
    MARKETING_ZAPIER_INGRESS_MAX_BYTES=65536
    MARKETING_ZAPIER_ALLOWED_SOURCES=rss-by-zapier,zapier
    MARKETING_ZAPIER_IDEMPOTENCY_TTL_DAYS=7

Never commit the real webhook key.

## Validation

    php spark marketing:ingress:contract-smoke

    vendor/bin/phpunit \
      --bootstrap tests/_support/bootstrap.php \
      tests/unit/Marketing/MarketingZapierIngressServiceTest.php

    bash tests/smoke/marketing-zapier-ingress-contract-smoke.sh

## Rollback

    MARKETING_ZAPIER_INGRESS_ENABLED=0

Do not drop the ingress audit or idempotency tables.
