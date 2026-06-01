# Solana Wallet Secret Backfill Audit

- Generated: 2026-06-01T14:36:52+00:00
- Mode: DRY-RUN
- Limit: 500
- Include all crypto: no

## Counts

- scanned: 2
- candidate: 2
- already_encrypted: 2
- plaintext: 0
- updated: 0
- skipped: 0
- errors: 0

## Rows

| id | user_id | wallet_type | market | nickname | public_token_hash | access_token_hash | classification | action |
|---:|---:|---|---|---|---|---|---|---|
| 919 | 2 | Crypto | SOL | MyMI Solana | 12d559f49aca149f | 3b51fbe5cca44582 | encrypted | already_encrypted |
| 927 | 2 | Crypto | SOL | Imported Solana Wallet | f33980cde10fb57a | bf737a9898417f66 | encrypted | already_encrypted |

## Safety Notes

- This report never prints raw `access_token`, private keys, mnemonics, or seed values.
- Hashes are SHA-256 prefixes for comparison only.
- Dry-run is the default. Use `--apply` only after reviewing candidate counts.
