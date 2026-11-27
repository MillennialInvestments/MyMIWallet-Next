# MyMI Wallet — Staging Certification, Production Deployment & Release Reconciliation

> **Release:** `20261127T164944Z-gtm-275c6eb8`  
> **Source Commit:** `275c6eb8b024e2babd970087bd315420ca17b508` (`main`)  
> **Rollback Target:** `20261127T145516Z-gtm-a8bc97d2`  
> **Execution Host:** `gq-ai01`  
> **Production URL:** `https://www.mymiwallet.com`  
> **Staging URL:** `https://staging.mymiwallet.com`  
> **Certification Date:** 2026-11-27  

---

## 1. Staging Release Candidate Certification

- **Candidate SHA:** `275c6eb8b024e2babd970087bd315420ca17b508`
- **Deployment Script:** `MIGRATE='2026-11-27-000300_CreateSportsQbWrMatchupTables' sudo -E bash scripts/ops/staging/mymi-staging.sh deploy main`
- **Release Directory:** `/apps/TBI/www/mymiwallet-staging/releases/20261127T164644Z-275c6eb8`
- **Route & Form Smoke Audit Results:**
  - `sudo bash scripts/ops/staging/mymi-staging.sh form-test`
  - Files Scanned: 297
  - Forms Scanned: 280
  - JS Requests: 272
  - Live Tests: **328 PASS, 0 FAIL, 192 BLOCKED (defensive rate/role limits), 32 SKIPPED**
  - Live Submits: 29 sent (**PASS 29, FAIL 0, BLOCKED 4, SKIPPED 84**)
  - Report Manifest: `/apps/TBI/www/mymiwallet-staging/shared/writable/aiops/form-tests/form-inventory-20261127_164815.json`

---

## 2. Production Deployment & Rollback Approval

- **Build Pipeline:** `bash scripts/ops/deploy/mymi-release.sh build main`
  - Build Artifact: `/apps/TBI/www/mymiwallet/releases/20261127T164944Z-gtm-275c6eb8`
  - Dependency Installation: Composer `--no-dev` (23 packages installed, optimized autoloader generated)
  - Node Modules: Chat microservice modules synced from `current/chat/node_modules`
- **Database Backup:**
  - Automated pre-migration snapshot: `mymiwallet_prod_20260628135446_20261127T165116Z.sql.gz` (132 MB)
- **Named Migration Executed:**
  - `2026-11-27-000300_CreateSportsQbWrMatchupTables` -> APPLIED & VERIFIED
    - Added `pass_def_rank`, `pass_yds_allowed_pg`, `pass_td_def_rank`, `scoring_def_rank`, `points_allowed_pg` to `bf_sports_defense_ranks`
    - Added `pass_att`, `completions`, `pass_yds`, `pass_td`, `interceptions` to `bf_sports_rb_game_logs`
    - Created `bf_sports_team_game_logs` table for team vs team spread/total history
  - `2026-10-26-180000_ShieldIdentityBackfill` -> Intentionally unapplied per `AGENTS.md` operational policy.
- **Atomic Symlink Switch:**
  - `switch_to 20261127T164944Z-gtm-275c6eb8`
  - Shared cache cleared (`php spark cache:clear`)
  - PHP-FPM & Nginx reloaded
- **Rehearsed Rollback Path:**
  - Available command: `bash scripts/ops/deploy/mymi-release.sh rollback 20261127T145516Z-gtm-a8bc97d2`

---

## 3. Production Reconciliation & Health Verification

- **HTTP Status:** `HTTP/2 200 OK`
- **Response Headers:**
  - `server: nginx/1.18.0 (Ubuntu)`
  - `content-type: text/html; charset=UTF-8`
  - `x-mymi-frontcontroller: 1`
  - `set-cookie: ci_session=13b3091de2da60fa1dca874ee46f8d33; expires=Fri, 27 Nov 2026 18:52:37 GMT; Max-Age=7200; path=/; domain=.mymiwallet.com; secure; HttpOnly; SameSite=Lax`
- **Chat Microservice:**
  - Endpoint: `https://www.mymiwallet.com/chat/health` -> `{"status":"ok","enabled":true}`
- **Automated Retention & Pruning:**
  - Kept newest 4 releases, plus active release `20261127T164944Z-gtm-275c6eb8` and previous release `20261127T145516Z-gtm-a8bc97d2`.
  - Pruned oldest release `20261127T012015Z-gtm-108b516c`.
- **System Stability:**
  - Error logs: Zero unhandled 500 exceptions in `writable/logs/emergency.log`.
  - Full regression test suite: 927 tests, 6,359 assertions passing.
