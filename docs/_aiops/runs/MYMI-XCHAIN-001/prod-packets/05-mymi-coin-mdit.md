# Production Promotion Packet 05: MyMI Coin Reg D 506(c) Offering on MDIT

**Feature Scope:** Accredited-only private placement offering under SEC Regulation D Rule 506(c), expression of interest capture, accredited investor gating, and MDIT token ledger minting.

---

### 1. Prerequisites & Required Gates
- **G8:** Formal legal counsel approval of Regulation D 506(c) offering memorandum, subscription agreement, and investor questionnaires.
- **G-REGCF:** Retain accredited-only limitation. Under no circumstances should retail public purchases or general exchange trading be enabled without separate SEC registration or FINRA funding portal onboarding.
- **G-PR-MERGE & G-PROD-DEPLOY:** Merged PR and release activation.

---

### 2. Required Database Migrations
Run named migration via `run-migrations.php`:
```bash
MIGRATE="CreateMyMICoinInterestTable"
```

---

### 3. Production Environment (.env) Configuration
Add the following to `/apps/TBI/www/mymiwallet/shared/.env`:
```bash
# MyMI Coin Reg D 506(c) Accredited Offering
FEATURE_MYMICOIN_OFFERING=true
MYMICOIN_MINIMUM_INVESTMENT_USD=5000
MYMICOIN_OFFERING_SYMBOL=MYMIC
```

---

### 4. Feature Flag Activation
Ensure `FEATURE_MYMICOIN_OFFERING=true` in `app/Config/Features.php` or `.env`.

---

### 5. Smoke Verification
1. Access offering page: `GET /Offerings/MyMI-Coin` (authenticated user).
2. Verify all statutory SEC Rule 144 / Reg D 506(c) disclaimers are visible.
3. Verify zero public purchase button: offering only provides an expression of interest form and accredited workflow.
4. Non-accredited gating verification: an unverified user attempting `POST /Offerings/MyMI-Coin/Deposit` receives 403 Forbidden (`accreditation_required`).
5. Accredited investor verification: a verified accredited investor (`kyc_status=VERIFIED`, `accreditation_status=ACCREDITED`) can initiate deposit and mint into `bf_mdit_token_ledger`.

---

### 6. Rollback Plan
1. Set `FEATURE_MYMICOIN_OFFERING=false` in `/apps/TBI/www/mymiwallet/shared/.env`.
2. Clear locator cache:
   ```bash
   sudo rm -f /apps/TBI/www/mymiwallet/shared/writable/cache/FileLocatorCache
   ```
3. Offering routes return 503 / disabled message. All expressions of interest and ledger mints remain preserved.
