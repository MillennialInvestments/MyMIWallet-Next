# AIOps Task: MYMI-XCHAIN-002 Multi-Crypto & Multi-Chain Platform Expansion

**Task Key:** `MYMI-XCHAIN-002`  
**Domain:** `crypto / payments / multi-chain / EVM / stablecoins / UTXO / Tron`  
**Created:** 2026-11-26  
**Governing Standard:** `tbi-fullstack-prep` (WF-ENG-003) & `tbi-release-evidence` (WF-ENG-005)  
**Parent Mission:** `MYMI-XCHAIN-001` (Closed & Promoted to Production)

---

## 1. Objective & Scope

Expand MyMI Wallet's multi-chain payment and transaction infrastructure across all requested cryptocurrency categories:

1. **EVM Rollups & Sidechains:**
   - Polygon (`POL` / `MATIC`, `USDC`, `USDT`) — Chain ID `137` (Amoy `80002`)
   - Arbitrum One (`ETH`, `ARB`, `USDC`, `USDT`) — Chain ID `42161` (Sepolia `421614`)
   - Optimism (`ETH`, `OP`, `USDC`, `USDT`) — Chain ID `10` (Sepolia `11155420`)
   - Avalanche C-Chain (`AVAX`, `USDC`, `USDT`) — Chain ID `43114` (Fuji `43113`)
   - BNB Smart Chain (`BNB`, `USDT`, `USDC`) — Chain ID `56` (Testnet `97`)
2. **Multi-Stablecoin Support:**
   - `USDT` (Tether): Solana, Ethereum, Base, Polygon, Arbitrum, Optimism, Avalanche, BSC.
   - `PYUSD` (PayPal USD): Solana, Ethereum.
   - `EURC` (Euro Coin): Solana, Ethereum, Base, Avalanche.
3. **UTXO Multi-Asset Address Pool:**
   - Litecoin (`LTC`): Dedicated address pool + Mempool/Blockchair verification.
   - Dogecoin (`DOGE`): Dedicated address pool + Mempool/Blockchair verification.
4. **Tron Payment Rail:**
   - Tron (`TRX`, `USDT-TRC20`): Base58Check address verification + TronGrid JSON-RPC transaction scanner.
5. **DEX Swaps & Paper Exchange:**
   - Expand `SwapService` quote providers for newly added assets.
   - Add new assets to Paper Exchange seed portfolio and trading pairs.

---

## 2. Invariants & Governance Constraints

1. **Zero Production Mutation:** Changes are developed on feature branches, validated in staging, and activated via governed production release packets.
2. **Zero Real Money / Keys:** Testnets (Amoy, Sepolia, Fuji, BSC Testnet, LTC Testnet, Shasta/Nile Tron) and sandboxes only.
3. **Zero New Composer / npm Dependencies:** All cryptographic, hashing, and encoding routines use native PHP 8.2 and browser standard Web APIs.
4. **Fail-Closed Feature Flags:** All new chains and tokens default to `false` in `app/Config/Features.php`.
5. **Sanctions Compliance:** Every payment and swap path screens recipient and sender addresses through `SanctionsScreen` before transaction generation.
6. **Form & Route Ratchet Integrity:** Must maintain `tests/baseline/form-action-gaps.txt` shrink-only ratchet (`FAIL 0`).
