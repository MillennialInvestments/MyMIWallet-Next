# Production Promotion Packet 03: Non-Custodial Decentralized Swaps

**Feature Scope:** Non-custodial DEX liquidity aggregation via Jupiter (Solana) and 0x Protocol (EVM). Users sign directly in self-custody wallets; MyMI never holds custody of funds.

---

### 1. Prerequisites & Required Gates
- **G-W5-EXECUTE:** Owner approval to enable live swap execution (`SWAPS_EXECUTE=true`).
- **0x API Key:** Production API key from 0x Protocol (`ZEROEX_API_KEY`).
- **G-RPC:** Keyed production RPC endpoints for Solana, Ethereum, and Base.
- **G-PR-MERGE & G-PROD-DEPLOY:** Merged PR and release activation.

---

### 2. Required Database Migrations
None (Non-custodial swaps do not require database tables; transactions occur on-chain between user wallet and DEX aggregators).

---

### 3. Production Environment (.env) Configuration
Add the following to `/apps/TBI/www/mymiwallet/shared/.env`:
```bash
# Non-Custodial Swaps Configuration
FEATURE_SWAPS=true
SWAPS_EXECUTE=true
SWAP_PLATFORM_FEE_BPS=50
ZEROEX_API_KEY=YOUR_PRODUCTION_0X_API_KEY
JUPITER_QUOTE_API=https://quote-api.jup.ag/v6/quote
ZEROEX_QUOTE_API=https://api.0x.org/swap/v1/quote
```

---

### 4. Feature Flag Activation
Ensure `FEATURE_SWAPS=true` in `app/Config/Features.php` or `.env`.

---

### 5. Smoke Verification
1. Access swap UI: `GET /Swaps` (authenticated user).
2. Fetch quote: `POST /Swaps/Quote` with `chain=solana`, `input_token=So11111111111111111111111111111111111111112`, `output_token=EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v`, `amount=1000000000`.
3. Verify fee breakdown displays: gross output, 50 bps platform fee, estimated network fee, net output.
4. Verify sanctions check blocks quotes for sanctioned wallet addresses.

---

### 6. Rollback Plan
1. Set `FEATURE_SWAPS=false` or `SWAPS_EXECUTE=false` in `/apps/TBI/www/mymiwallet/shared/.env`.
2. Clear locator cache:
   ```bash
   sudo rm -f /apps/TBI/www/mymiwallet/shared/writable/cache/FileLocatorCache
   ```
3. Swap routes immediately return 503 / disabled message.
