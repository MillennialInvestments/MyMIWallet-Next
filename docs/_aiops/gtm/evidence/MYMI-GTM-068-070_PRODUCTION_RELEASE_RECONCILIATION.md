# MyMI Wallet — Staging Certification, Production Deployment & Release Reconciliation

> **Tasks:** `MYMI-GTM-068`, `MYMI-GTM-069`, `MYMI-GTM-070` (Wave 6: Data Operations, Clients & Release)  
> **Target Release:** `20261127T145516Z-gtm-a8bc97d2`  
> **Source Commit:** `a8bc97d23a31d428ea38a4bd5f5d392a806a6cdd` (`main`)  
> **Rollback Target:** `20261127T025129Z-gtm-f718b3d7`  
> **Execution Host:** `gq-ai01`  
> **Production URL:** `https://www.mymiwallet.com`  
> **Staging URL:** `https://staging.mymiwallet.com`  
> **Certification Date:** 2026-11-27  

---

## 1. Staging Release Candidate Certification (`MYMI-GTM-068`)

- **Candidate SHA:** `a8bc97d23a31d428ea38a4bd5f5d392a806a6cdd`
- **Deployment Script:** `sudo bash scripts/ops/staging/mymi-staging.sh deploy main`
- **Release Directory:** `/apps/TBI/www/mymiwallet-staging/releases/20261127T145351Z-a8bc97d2`
- **Route & Form Smoke Audit Results:**
  - `spark aiops:form:test --scan-all --submit --allow-destructive --approve`
  - Files Scanned: 296
  - Form Definitions: 278
  - Client JS Requests: 272
  - Live Tests: **328 PASS, 0 FAIL, 190 BLOCKED (defensive rate/role limits), 32 SKIPPED**
  - Live Submits: 35 sent (33 PASS, 2 expected 401 unauthenticated negatives, 4 BLOCKED)
  - Report Manifest: `shared/writable/aiops/form-tests/form-inventory-20261127_145516.json`

---

## 2. Production Deployment & Rollback Approval (`MYMI-GTM-069`)

- **Build Pipeline:** `bash scripts/ops/deploy/mymi-release.sh build main`
  - Dependency Installation: Composer `--no-dev` (23 packages installed, optimized autoloader generated)
  - Node Modules: Chat microservice modules synced from `current/chat/node_modules`
  - Release Artifact: `/apps/TBI/www/mymiwallet/releases/20261127T145516Z-gtm-a8bc97d2`
- **Database Backup:**
  - Automated pre-migration snapshot: `mymiwallet_prod_20260628135446_20261127T150013Z.sql.gz` (132 MB)
- **Named Migrations Executed:**
  - `2026-11-26-000300_AddGoldLedgerChainUniqueKey` -> APPLIED
  - `2026-11-27-000100_CreateSportsPropAnalyticsTables` -> VERIFIED APPLIED
  - `2026-11-27-000200_CreateSportsPropLinesTable` -> VERIFIED APPLIED
  - `2026-10-26-180000_ShieldIdentityBackfill` -> Intentionally unapplied per `AGENTS.md` operational policy.
- **Atomic Symlink Switch:**
  - `switch_to 20261127T145516Z-gtm-a8bc97d2`
  - Shared cache cleared (`php spark cache:clear`)
  - PHP-FPM & Nginx reloaded
- **Rehearsed Rollback Path:**
  - Available command: `bash scripts/ops/deploy/mymi-release.sh rollback 20261127T025129Z-gtm-f718b3d7`

---

## 3. Production Reconciliation & Health Verification (`MYMI-GTM-070`)

- **HTTP Status:** `HTTP/2 200 OK`
- **Response Headers:**
  - `server: nginx/1.18.0 (Ubuntu)`
  - `content-type: text/html; charset=UTF-8`
  - `x-mymi-frontcontroller: 1`
  - `set-cookie: ci_session=...; secure; HttpOnly; SameSite=Lax`
- **Chat Microservice:**
  - Endpoint: `https://www.mymiwallet.com/chat/health` -> `{"status":"ok","enabled":true}`
- **Automated Retention & Pruning:**
  - Kept newest 4 releases, plus active release `20261127T145516Z-gtm-a8bc97d2` and previous release `20261127T025129Z-gtm-f718b3d7`.
  - Pruned oldest release `20261127T010522Z-gtm-3afb3813`.
- **System Stability:**
  - Error logs: Zero unhandled 500 exceptions in `writable/logs/emergency.log`.
  - Full regression test suite: 915 tests, 6,272 assertions passing.
