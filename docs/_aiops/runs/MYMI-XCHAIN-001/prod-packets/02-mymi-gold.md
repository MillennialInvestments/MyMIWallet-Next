# Production Promotion Packet 02: MyMI Gold In-App Credit

**Feature Scope:** MyMI Gold in-app closed-loop utility credit, store pricing discounts, daily purchase limits, and deferred revenue reporting.

---

### 1. Prerequisites & Required Gates
- **G8:** Legal counsel terms sign-off (confirming closed-loop in-app utility credit status, zero cash value, no cash-out or peer-to-peer transfer).
- **G14:** Financial security sign-off for activating Gold purchase flows.
- **G-PR-MERGE & G-PROD-DEPLOY:** Merged PR and release activation.

---

### 2. Required Database Migrations
Run named migration via `run-migrations.php`:
```bash
MIGRATE="CreateGoldLedger"
```

---

### 3. Production Environment (.env) Configuration
Add the following to `/apps/TBI/www/mymiwallet/shared/.env`:
```bash
# MyMI Gold Closed-Loop In-App Credit
FEATURE_MYMIGOLD_PURCHASES=true
MYMIGOLD_DAILY_CAP_USD=2000
MYMIGOLD_DISCOUNT_BPS=1000
```

---

### 4. Feature Flag Activation
Ensure `FEATURE_MYMIGOLD_PURCHASES=true` is enabled in `app/Config/Features.php` or through environment variable.

---

### 5. Smoke Verification
1. Access purchase page: `GET /Wallets/Purchase/MyMI-Gold` (authenticated user).
2. Verify daily cap check blocks orders exceeding $2,000.00.
3. Verify pricing discount logic: services display USD price and discounted Gold equivalent (10% discount).
4. Verify non-transferability invariant: no withdrawal, export, or send endpoints exist.

---

### 6. Rollback Plan
1. Set `FEATURE_MYMIGOLD_PURCHASES=false` in `/apps/TBI/www/mymiwallet/shared/.env`.
2. Clear locator cache:
   ```bash
   sudo rm -f /apps/TBI/www/mymiwallet/shared/writable/cache/FileLocatorCache
   ```
3. All purchase routes immediately return 503 / disabled message. Existing user Gold balances in `bf_gold_ledger` remain intact and unspent.
