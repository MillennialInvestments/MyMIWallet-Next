# MDIT Phase 1 (Reg D 506(c)) Implementation Notes

This phase implements the accredited-only workflow with sandbox-first integrations. It does **not** include Reg A+ or retail flows.

## Scope Delivered
- **KYC + accreditation sandbox adapter** with status persistence in `bf_mdit_investor_profiles`.
- **Accredited-only gating** for deposits, minting, and redemptions.
- **Deposit → mint happy path** (manual confirmation + admin mint).
- **Manual redemption approval** (admin-only) with burn ledger entry.
- **Daily NAV snapshot** (command + admin endpoint) with Redis cache fallback to DB.
- **Webhook-ready deposit confirmation** endpoint with signature verification stub.

## Key API Endpoints (JSON)
All endpoints are registered under the `/API/Mdit` prefix.

### Investor
- `POST /API/Mdit/kyc/start`
- `GET /API/Mdit/kyc/status`
- `POST /API/Mdit/accreditation/attest`
- `POST /API/Mdit/deposits/initiate`
- `POST /API/Mdit/deposits/confirm` (sandbox)
- `POST /API/Mdit/issuance/mint`
- `POST /API/Mdit/redemptions/request`
- `GET /API/Mdit/portfolio/summary`

### Admin (requires `mdit.admin`)
- `GET /API/Mdit/admin/redemptions/pending`
- `POST /API/Mdit/admin/redemptions/approve`
- `GET /API/Mdit/admin/deposits/pending`
- `POST /API/Mdit/admin/nav/compute_today`

### Webhook
- `POST /API/Mdit/webhooks/onramp`

## NAV Cron
Run daily with:

```bash
php spark mdit:nav:compute_daily
```

Optional overrides:

```bash
php spark mdit:nav:compute_daily 100000 250000
```

## Auth + Permissions
- Investor endpoints require authentication.
- Admin endpoints require the `mdit.admin` permission (group `mdit_admin` is created and mapped to the permission).

## Compliance Notes
- No legal advice or return promises are displayed.
- Transfers and issuance remain restricted to verified + accredited users.

## Sandbox Tips
- Override sandbox KYC/accreditation checks via env vars:
  - `mdit.sandboxKycStatus=VERIFIED`
  - `mdit.sandboxAccreditationStatus=ACCREDITED`
