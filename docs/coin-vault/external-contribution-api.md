# Coin Vault External Contribution API

## Endpoint

`POST /API/CoinVault/contributionEvent`

This endpoint accepts approved contribution events from external project systems such as `timothyburks.com`. Accepted events are queued as pending contributions until an admin approves release from the project vault.

## Payload

```json
{
  "project_key": "tbi_aiops",
  "coin_symbol": "TBI",
  "user_email": "user@example.com",
  "contribution_type": "task",
  "source": "timothyburks_contribution_tracker",
  "source_id": 123,
  "usd_amount": 25.00,
  "hours": 1.00,
  "task_count": 1,
  "memo": "Completed AIOps task"
}
```

## Authentication

Allowed clients are configured in `Config\CoinVault::$externalClients`.

Supported authentication headers:

- `X-CoinVault-Api-Key`: matches the configured environment variable.
- `X-CoinVault-Signature`: HMAC SHA-256 of the raw request body, optionally prefixed with `sha256=`.

For the TimothyBurks.com tracker client, configure one or both of:

- `COINVAULT_TIMOTHYBURKS_API_KEY`
- `COINVAULT_TIMOTHYBURKS_HMAC_SECRET`

Do not commit real secrets to the repository.

## Duplicate prevention

The ingestion service rejects any second event with the same `source` and `source_id` pair.

## Approval lifecycle

1. External system posts an event.
2. MyMI Wallet validates client authentication and duplicate status.
3. Contribution is stored as `pending`.
4. Admin approves or rejects the contribution.
5. Approval calculates coins, releases from vault, writes ledger, updates wallet, and updates released/vault supply.
