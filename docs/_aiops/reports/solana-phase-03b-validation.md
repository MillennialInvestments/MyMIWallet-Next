# Solana Exchange Phase 03B Validation

## Scope

Implemented Phase 03B command and security cleanup for the Solana Exchange surface. The patch adds the missing Spark command layer, removes browser JSON private-key exposure from Solana wallet responses, defaults Solana write actions to devnet/draft behavior, and adds explicit mainnet mint/broadcast guardrails.

## Files Changed

- `app/Commands/SolanaHealthcheck.php`
- `app/Commands/SolanaDigest.php`
- `app/Commands/SolanaTransactionAudit.php`
- `app/Commands/CreateTbiProjectCoinDrafts.php`
- `app/Config/Commands.php`
- `app/Config/Console.php`
- `app/Modules/APIs/Controllers/SolanaAPIController.php`
- `app/Modules/Exchange/Controllers/SolanaController.php`
- `app/Libraries/MyMISolana.php`
- `app/Services/SolanaService.php`
- `docs/_aiops/reports/solana-phase-03b-validation.md`
- `docs/_aiops/checklists/solana-phase-03b-security-readiness.md`

## Commands Added

- `aiops:solana-healthcheck`
- `aiops:solana-digest`
- `aiops:solana-transaction-audit`
- `exchange:create-tbi-project-coin-drafts`

## Routes Verified

The Solana digest/healthcheck commands inspect `app/Config/Routes.php` and verify the registered Solana API and Exchange route surface, including:

- `API/Solana/health`
- `API/Solana/wallet/(:segment)/balance`
- `API/Solana/wallet/(:segment)/tokens`
- `API/Solana/transfer`
- `API/Solana/swap/quote`
- `API/Solana/swap/execute`
- `API/Solana/token/create`
- `API/Solana/token/mint`
- `Exchange/Solana` route group

## Private-Key Exposure Fixes

- Solana wallet creation/import responses no longer include `privateKey` in JSON payloads.
- Response helper sanitization removes `privateKey`, `private_key`, `access_token`, `secret`, `secret_key`, `secret_key_b64`, `seed`, `seed_b64`, and `mnemonic` from nested API payloads.
- Existing database storage compatibility is preserved where legacy wallet records use `access_token`, but the secret is not returned to browser JSON.

## Mainnet Guardrail Fixes

- `SolanaService` now defaults RPC and websocket fallbacks to devnet instead of public mainnet endpoints.
- `SolanaService::guardMainnetAction()` blocks mainnet mint actions unless `SOLANA_ALLOW_MAINNET_MINTING=true`.
- `SolanaService::guardMainnetAction()` blocks mainnet broadcast actions unless `SOLANA_ALLOW_MAINNET_BROADCAST=true`.
- `MyMISolana` delegates to the reusable guard before transfer, swap, token creation, and mint wrapper calls.
- API/Exchange controller mint paths return safe JSON failures when guardrails block an action.

## Draft Coin Creation Validation

The `exchange:create-tbi-project-coin-drafts` command is idempotent and defaults to dry-run. It prepares draft/devnet-only records for:

- `TBI Coin` (`tbi_coin`)
- `TBI Invest Coin` (`tbi_invest_coin`)

The command resolves or prepares a `TBI Solutions Project` project reference where the project table is available. It never mints tokens, never calls mainnet, and never broadcasts transactions.

## Validation Commands

Run results are recorded in the pull request summary. Commands include PHP lint checks, Spark command registration, the three AIOps Solana commands, and the TBI draft creation dry-run. The apply step was not run in this environment because the dry-run reported a database connection warning (`Connection refused`).

## Remaining Risks

- Legacy wallet secrets may still exist in the database `access_token` column; this patch prevents browser response exposure but does not migrate or encrypt historical secrets.
- Some legacy Solana Exchange methods still accept private keys in POST bodies for existing workflows; they are guarded for mainnet write safety but should be replaced with server-side signing or external wallet signing in a later phase.
- The apply path for draft coin creation depends on the target database schema and migrations being present in the runtime environment.
