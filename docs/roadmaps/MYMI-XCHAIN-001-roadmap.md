# MYMI-XCHAIN-001 — Multi-chain payments, MyMI Gold, MyMI Exchange and MyMI Coin

## Objective

Build the complete multi-chain stack on **staging.mymiwallet.com** in one
continuous run, then promote it to production one feature at a time as each
launch gate (counsel, partner, keys, owner approval) is met.

Owner plan and rationale: Claude Doc "MyMI multi-chain, exchange and token plan"
(https://claude.ai/artifact/FEJDwE1gHDDLawwg9eHWNK). Summary:

- Crypto checkout (ETH/Base USDC, XRP, BTC, Solana USDC) goes to production first.
- MyMI Gold launches as **closed-loop in-app credit** (spend on MyMI services,
  discount when paid in Gold). No cash-out, no user-to-user transfer.
- MyMI Exchange launches through a **licensed partner** (custodial trades) plus
  **non-custodial swaps** from users' own wallets. Staging uses a paper-trading
  provider until a partner is signed.
- MyMI Coin is a **security**: it is offered only through the existing MDIT
  Reg D 506(c) accredited workflow (or Reg CF later). No public sale, no listing
  on MyMI Exchange.

## Governed lane

- Repository: `MillennialInvestments/mymiwallet-next` (`/apps/TBI/repos/mymiwallet-next` on gq-ai01)
- Base: `main`
- One feature branch per wave: `feature/mymi-xchain-001-w<N>-<slug>`
- Staging integration branch: `integration/mymi-xchain-001` (all wave branches merged, deployed to staging only)
- Run ledgers: `docs/_aiops/runs/MYMI-XCHAIN-001/` (`progress.md`, `errors.md`, `gates.md`, `final-report.md`)
- Production mutation authorized: **no**. Merge authorized: **no** (owner merges).

## Already in place (do not rebuild)

| Area | Where | State |
| --- | --- | --- |
| Crypto checkout ETH/Base/XRP/BTC | `app/Libraries/CryptoPay/`, `bf_crypto_pay_requests`, `cryptopay:reconcile`, `cryptopay:test-checkout` | Merged (#766, #767). Staging PASS for XRP and Ethereum. |
| Solana Pay USDC | `app/Config/SolanaPay.php`, `SolanaPayTxController`, `solanapay:reconcile` | Merged (#758). No recorded staging e2e. |
| Daily live chain probe | `.github/workflows/crypto-live-probe.yml`, `tests/live/CryptoPayLiveTest.php` | Green |
| Test wallets | `tools/testnet-wallets/wallets.mjs` (`~/mymi-testnet-wallets` on gq-ai01) | Working |
| Secure Transfer, SOL fees | `app/Config/SecureTransfer.php`, WalletConnect project id | Live |
| Money switches | `app/Config/Features.php` (`FEATURE_MYMIGOLD_PURCHASES`, `FEATURE_WALLETS`, `FEATURE_SOLANA_TRADING`, ...) | All money switches OFF in production (gate G14) |
| Legacy MyMI Gold / MyMI Coin | `app/Models/MyMIGoldModel.php`, `MyMICoinModel.php`, `bf_exchanges*`, `app/Modules/Exchange/` | Legacy, inventory only |
| MDIT (Reg D 506(c) token workflow) | `app/Services/MDIT/`, `/API/Mdit/*`, `docs/mdit/phase1_implementation_notes.md` | Sandbox KYC + accreditation, mint/redeem |
| Platform and trading MCPs | `scripts/mcp/mymi_platform_mcp_server.py`, `trading_mcp_server.py` | Read-only |

## Wave DAG

```
W0 baseline
 ├─ W1 chain hardening ──────┐
 ├─ W8 compliance tooling ───┼─ W4 MyMI Gold ── W6 exchange (paper) ── W7 MyMI Coin (MDIT)
 ├─ W2 BTC address pool      │
 ├─ W3 EVM one-click pay     │
 └─ W5 non-custodial swaps ──┘
all ── W9 staging integration ── W10 production packets ── W11 closeout
```

Run order (sequential agent): W0, W1, W8, W4, W2, W3, W5, W6, W7, W9, W10, W11.
A BLOCKED wave never stops independent waves.

## Golden Tasks

### W0 — Baseline and ledgers
- Inventory every path in "Already in place"; record current routes, commands, migrations, flags.
- Create `docs/_aiops/runs/MYMI-XCHAIN-001/{progress,errors,gates}.md`.
- Record the PHPUnit baseline (`vendor/bin/phpunit tests/unit/CryptoPay` and the full suite count).
- Acceptance: ledgers exist; baseline numbers recorded; no source change.

### W1 — Chain hardening
1. Keyed RPC support: document `CRYPTO_PAY_ETHEREUM_RPC` / `CRYPTO_PAY_BASE_RPC` lists (keyed first, public last) in `env` template and `docs/crypto-pay/README.md`. No keys in git.
2. `tools/testnet-wallets/wallets.mjs`: live fee rate from Esplora `/v1/fees/recommended` (floor 2 sat/vB), RBF-enabled inputs, `bump <txid>` command, `TESTNET_BITCOIN_ESPLORA` signet support documented.
3. Solana Pay devnet e2e: `wallets.mjs pay` support for Solana Pay checkouts (or a `solanapay:test-checkout` command mirroring `cryptopay:test-checkout`).
4. Alerts: reconcile failures, `late_payment`, underpayment and endpoint-network refusals post to the AIOps/Discord webhook already used by the app (env-configured, off by default).
5. Support admin page: list crypto checkouts by status; actions "credit Gold" and "mark refunded (manual)" with an append-only audit row. Admin role filter, session identity only.
6. Sanctions screening: `SanctionsScreen` service reading a local, versioned list file of sanctioned crypto addresses (`writable/compliance/sanctions/addresses.json`, refreshed by `compliance:sanctions-refresh` from the public OFAC SDN list; self-hosted copy, no runtime third-party dependency). Checked on payer address before fulfilment; a hit holds the order for review.
7. Checkout UI: show network fee estimate, MyMI fee and total before payment.
- Acceptance: unit tests for each service; `cryptopay` suite green; `git diff --check` clean.

### W8 — Compliance tooling
1. `KycProvider` interface; `SandboxKycProvider` reusing MDIT's sandbox adapter; status stored per user.
2. Append-only, hash-chained `bf_compliance_audit` (same pattern as `bf_secure_transfer_audit`) with `compliance:audit --verify`.
3. Admin compliance dashboard: sanctions holds, KYC status, large-transaction review queue (threshold env, default $3,000), audit verify result.
4. Disclosure pages: crypto risk, fees, MyMI Gold terms (closed-loop, no cash value, expiry/inactivity per counsel placeholder), not-investment-advice. Marked "DRAFT — pending counsel (gate G8)".
- Acceptance: tests for KYC state machine and audit chain; pages render; routes certified.

### W4 — MyMI Gold (closed-loop credit)
1. Append-only ledger `bf_mymigold_ledger` (credit_purchase, spend, refund, adjustment, expiry) + balance view; idempotency key per entry.
2. Purchase paths: CryptoPay purpose `mymigold` (fulfiller exists) and existing PayPal flow, both behind `FEATURE_MYMIGOLD_PURCHASES`.
3. Spend: a `GoldPricing` service; any service/feature with a USD price gets a Gold price = USD × (1 − `MYMIGOLD_DISCOUNT_BPS`/10000), default 1000 bps. Checkout lets the user pay in Gold.
4. Guardrails: per-user daily purchase cap (`MYMIGOLD_DAILY_CAP_USD`, default 2000); **no** transfer, withdraw or cash-out endpoint; refunds return to original method.
5. Reports: outstanding Gold balance (deferred revenue), purchases, spends, by day.
6. Legacy MYMIG exchange-order path: inventory only; put its routes behind the flag if not already; do not delete.
- Acceptance: ledger invariant tests (balance = sum of entries, no negative balance, idempotent retries); IDOR tests; flag OFF hides every Gold purchase route.

### W2 — Bitcoin address per checkout
- Pre-generated address pool from an xpub (generated offline by `wallets.mjs xpub-pool`, imported by `cryptopay:btc-pool-import`); PHP takes the next unused address per checkout. **No new Composer dependency.**
- Bitcoin adapter matches by address when a pool address is set, falls back to amount tags otherwise.
- Acceptance: unit tests for pool exhaustion (fail closed), reuse prevention, matcher by address.

### W3 — One-click EVM payment
- Browser wallet button (EIP-1193: MetaMask, or WalletConnect using the existing project id) that builds the ERC-20 `transfer(recipient, amount_raw)` call data by hand and requests `eth_sendTransaction`; checks `eth_chainId` first. **No new npm dependency**; self-hosted JS only.
- Acceptance: JS unit test of call-data encoding; manual staging run on Sepolia recorded.

### W5 — Non-custodial swaps
- `SwapQuoteProvider` interface; Jupiter (Solana) and 0x (EVM) adapters; user signs in their own wallet; MyMI never holds funds. Fee shown before signing. Sanctions screen on the user's address.
- Testnets lack swap liquidity: staging shows mainnet **quotes only**; execution disabled on staging (`SWAPS_EXECUTE=false`); record as gate.
- Flag `FEATURE_SWAPS` (default false).
- Acceptance: adapter tests against recorded fixtures; UI renders quotes on staging.

### W6 — MyMI Exchange (paper provider)
- `ExchangeProvider` interface (quote, place order, cancel, balances, history).
- `PaperExchangeProvider`: in-database paper trading using `SpotPrice` live prices; per-user paper balances.
- UI: markets, buy/sell, portfolio, order history, using existing Exchange module layout where usable.
- Partner adapters (licensed crypto-as-a-service) left as documented stubs: gate "partner contract".
- MyMI Gold and MyMI Coin are **not** tradable assets.
- Flag `FEATURE_EXCHANGE_PAPER` (default false; true on staging).
- Acceptance: order state machine tests; balance never negative; IDOR tests.

### W7 — MyMI Coin offering on MDIT
- Map "MyMI Coin" onto the MDIT Reg D 506(c) flow: offering page, interest list, accredited-only KYC/accreditation (sandbox), deposit → mint in the MDIT ledger.
- Optional devnet SPL test token for ledger anchoring; no mainnet mint.
- No public purchase button; no listing on the exchange; marketing copy makes no return promises.
- Flag `FEATURE_MYMICOIN_OFFERING` (default false; staging true).
- Acceptance: accredited-only gate tests; non-accredited user cannot reach deposit or mint.

### W9 — Staging integration
- Create `integration/mymi-xchain-001` from `main`; merge every wave branch (`--no-ff`); resolve conflicts there only.
- Write `scripts/ops/staging/mymi-xchain-staging.md`: one copy-paste block for the owner: deploy the integration ref with `MIGRATE=<named list>`, append staging-only `.env` lines (testnet, flags ON), crons.
- Write `scripts/ops/staging/mymi-xchain-smoke.sh`: read-only checks for every new route and command.
- Acceptance: integration branch passes `vendor/bin/phpunit`, `php -l` on changed files, form-certification smoke.

### W10 — Production promotion packets (prepared, not run)
One packet per feature in `docs/_aiops/runs/MYMI-XCHAIN-001/prod-packets/`: prerequisites (gate list), migrations, `.env` lines, flag to turn on, smoke, rollback. Order: crypto checkout → MyMI Gold → swaps → exchange (partner) → MyMI Coin.

### W11 — Closeout
- Resolve or re-classify every `errors.md` row; final report; propose `AGENTS.md` lessons via a docs PR; AIOps chatroom check-in.

## Owner gates (recorded in gates.md, never bypassed)

| Gate | Blocks |
| --- | --- |
| Counsel sign-off (G8) | Gold terms, discounts, MyMI Coin offering, exchange launch, user-to-user transfers |
| Keyed RPC keys in `shared/.env` | Production crypto checkout |
| Exchange partner contract and sandbox keys | Custodial trading |
| Funding portal / Reg CF filing (if chosen) | Retail MyMI Coin |
| PR merges | Everything reaching `main` |
| Production deploy + named migrations | Every production feature |
| Money switches by name (G14) | Every production flag |
