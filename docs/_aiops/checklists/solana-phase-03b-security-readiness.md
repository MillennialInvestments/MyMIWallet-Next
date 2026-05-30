# Solana Phase 03B Security Readiness Checklist

## Command Layer

- [x] `aiops:solana-healthcheck` added.
- [x] `aiops:solana-digest` added.
- [x] `aiops:solana-transaction-audit` added with `--days=7` support.
- [x] `exchange:create-tbi-project-coin-drafts` added with `--dry-run` and `--apply` support.
- [x] Commands write reports under `docs/_aiops/reports/solana-phase-03b/`.
- [x] Commands print short summaries only.

## Private-Key Exposure

- [x] API wallet creation response returns public wallet identifiers only.
- [x] API wallet import responses return public wallet identifiers only.
- [x] Exchange wallet creation response returns public wallet identifiers only.
- [x] Exchange wallet import responses return public wallet identifiers only.
- [x] Sanitizers remove private key and seed/mnemonic style fields from nested JSON payloads.
- [x] No secrets are printed by the new Spark commands.

## Mainnet Guardrails

- [x] Default Solana RPC fallback changed to devnet.
- [x] Default Solana websocket fallback changed to devnet.
- [x] Mainnet minting requires `SOLANA_ALLOW_MAINNET_MINTING=true`.
- [x] Mainnet broadcast requires `SOLANA_ALLOW_MAINNET_BROADCAST=true`.
- [x] Read-only market data remains separate from mint/broadcast guardrails.
- [x] Controller mint paths return safe failure envelopes when blocked.

## Draft Coin Support

- [x] `TBI Coin` draft definition added.
- [x] `TBI Invest Coin` draft definition added.
- [x] `TBI Solutions Project` lookup/creation support added where schema allows.
- [x] Draft metadata records devnet-only and no-broadcast constraints.
- [x] Command is idempotent by `coin_key`.

## Readiness Decision

Phase 03B is ready for review after validation commands pass in the target environment. Production rollout should keep mainnet mint/broadcast flags unset unless a separately approved live minting runbook is completed.
