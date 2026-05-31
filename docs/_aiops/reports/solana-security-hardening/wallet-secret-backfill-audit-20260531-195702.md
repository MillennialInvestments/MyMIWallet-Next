# Solana Wallet Secret Backfill Audit

- Generated: 2026-05-31T19:57:02+00:00
- Mode: DRY-RUN
- Limit: 500
- Include all crypto: no

## Counts

- scanned: 2
- candidate: 2
- already_encrypted: 0
- plaintext: 2
- updated: 0
- skipped: 0
- errors: 0

## Rows

| id | user_id | wallet_type | market | nickname | public_token_hash | access_token_hash | classification | action |
|---:|---:|---|---|---|---|---|---|---|
| 919 | 2 | Crypto | SOL | MyMI Solana | 12d559f49aca149f | b07f04d4291970a1 | plaintext | would_encrypt |
| 927 | 2 | Crypto | SOL | Imported Solana Wallet | f33980cde10fb57a | 663d0358b31fe22a | plaintext | would_encrypt |

## Safety Notes

- This report never prints raw `access_token`, private keys, mnemonics, or seed values.
- Hashes are SHA-256 prefixes for comparison only.
- Dry-run is the default. Use `--apply` only after reviewing candidate counts.
