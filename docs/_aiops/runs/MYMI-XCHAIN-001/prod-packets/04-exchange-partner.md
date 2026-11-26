# Production Promotion Packet 04: MyMI Exchange (Paper & Partner)

**Feature Scope:** In-database paper trading exchange with simulated live tickers, non-negative balance enforcement, and documented partner stubs for licensed crypto-as-a-service.

---

### 1. Prerequisites & Required Gates
- **G-PARTNER:** Execution of licensed Crypto-as-a-Service partner agreement (Zero Hash, Bakkt, Paxos) and provision of production credentials before enabling live custodial order routing.
- **Untradable Assets Policy:** Strict verification that MyMI Gold and MyMI Coin are permanently hardcoded as untradable on any exchange interface.
- **G-PR-MERGE & G-PROD-DEPLOY:** Merged PR and release activation.

---

### 2. Required Database Migrations
Run named migration via `run-migrations.php`:
```bash
MIGRATE="CreatePaperExchangeTables"
```

---

### 3. Production Environment (.env) Configuration
Add the following to `/apps/TBI/www/mymiwallet/shared/.env`:
```bash
# MyMI Exchange Configuration
FEATURE_EXCHANGE_PAPER=true
# Partner keys remain unset until Gate G-PARTNER is cleared
# EXCHANGE_PARTNER_API_KEY=
# EXCHANGE_PARTNER_SECRET=
```

---

### 4. Feature Flag Activation
Ensure `FEATURE_EXCHANGE_PAPER=true` in `app/Config/Features.php` or `.env`.

---

### 5. Smoke Verification
1. Access paper exchange dashboard: `GET /Exchange/Paper` (authenticated user).
2. Verify initial seed funding: user portfolio displays $10,000.00 USD paper cash.
3. Place test paper order: `POST /Exchange/Paper/Order` with `symbol=BTC/USD`, `side=buy`, `quantity=0.01`.
4. Verify non-negative balance checks: attempt to buy 5 BTC ($450,000) with $10,000 USD is rejected with `insufficient_funds`.
5. Verify untradable assets guard: attempt to trade `MYMIG/USD` or `MYMIC/USD` is blocked with 400 error.

---

### 6. Rollback Plan
1. Set `FEATURE_EXCHANGE_PAPER=false` in `/apps/TBI/www/mymiwallet/shared/.env`.
2. Clear locator cache:
   ```bash
   sudo rm -f /apps/TBI/www/mymiwallet/shared/writable/cache/FileLocatorCache
   ```
3. Exchange routes return 503 / disabled message. Paper balances and order history in `bf_paper_exchange_orders` and `bf_paper_exchange_balances` remain securely preserved.
