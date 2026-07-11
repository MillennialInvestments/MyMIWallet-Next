# GT-NH-005 Containment

## Default state

    MARKETING_ZAPIER_INGRESS_ENABLED=0
    MARKETING_ZAPIER_WEBHOOK_KEY=
    MARKETING_ZAPIER_CONTRACT_TEST_ENABLED=0
    MARKETING_ZAPIER_INGRESS_RATE_LIMIT=60
    MARKETING_ZAPIER_INGRESS_MAX_BYTES=65536

## Immediate operational containment

Set:

    MARKETING_ZAPIER_INGRESS_ENABLED=0

Reconcile the application configuration cache only through the
approved deployment process.

## Data policy

Do not drop:

- `bf_marketing_zapier_ingress`
- `bf_marketing_zapier_ingress_idempotency`

These tables contain audit and duplicate-suppression records.

## Forbidden behavior

GT-NH-005 must not:

- publish content;
- approve content;
- generate social content;
- enqueue distribution;
- invoke outbound Zapier services;
- log or persist the webhook key;
- change global CSRF policy;
- mutate production outside an approved deployment.
