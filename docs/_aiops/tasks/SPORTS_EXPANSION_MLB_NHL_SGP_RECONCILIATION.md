# Sports Intelligence Expansion: MLB + NHL + SGP Correlation Engine Reconciliation

**Date:** 2026-11-27  
**Branch:** `feature/sports-mlb-nhl-sgp-engine`  
**Base Commit:** `2b5d47e9b`  
**Target:** `main`  
**Migration:** `2026-11-27-000600_CreateSportsMlbNhlAndSgpTables`  

---

## 1. Executive Summary

In accordance with user directives to maximize dashboard capabilities with advanced sports analytics and quantitative correlation engines, this release delivers **Phase 1 of Sports Expansion**:
1. **MLB Baseball Intelligence**:
   - Starting Pitcher strikeout distributions ($K\%$, swinging strikes, opponent strikeout rate tiers: Top 10 high swing-and-miss vs Bottom 10 contact-heavy).
   - Batter platoon splits (vs LHP vs vs RHP) for Total Bases, Hits, and Runs+RBIs.
   - Ballpark altitude and dimension multipliers (e.g. Coors Field thin-air run & HR factor boosts).
   - First 5 Innings (F5) quantitative model (pythagorean expectation based on FIP/ERA proxies).
   - Dedicated views under `/MyMISports/MLB` and `/MyMISports/MLB/Player/(:num)`.
2. **NHL Hockey Analytics**:
   - Skater Shots on Goal (SOG) props vs opponent shot suppression tiers.
   - Goalie Saves, Goals Against, and Save % distributions.
   - Special Teams mismatch engine (Power Play PP% vs Penalty Kill PK% net advantage scoring).
   - Dedicated views under `/MyMISports/NHL` and `/MyMISports/NHL/Player/(:num)`.
3. **Same-Game Parlay (SGP) Correlation & +EV Valuation Engine**:
   - Mathematical solver for empirical cross-market covariance ($r$):
     $$P(A \cap B) = P(A) \times P(B) + r \times \sqrt{P(A)(1 - P(A)) \times P(B)(1 - P(B)))}$$
   - Solves fair joint correlated American odds vs synthetic sportsbook parlay juice to detect mispriced +EV parlays.
   - Interactive live calculation widget and multi-sport correlation matrix table under `/My-Bets/SGP` and `/My-Bets/SGP/Calculate`.
4. **Dashboard Navigation**:
   - Sidenav bar (`sidebar.php`): Added `MLB Analytics` and `NHL Analytics` under `My Sports`; added `SGP Correlation Engine` under `My Bets`.
   - Hub navigation bar (`_header.php`): Added `MLB`, `NHL`, and `SGP Engine` tabs.

---

## 2. Regulatory & Non-Custodial Compliance

- **CFTC / State Sports Gaming Rules:** Strictly analytical and educational. No real wagers brokered, placed, or accepted. `SportsPropsService::DISCLAIMER` is rendered on all views and JSON API payloads.
- **Fail-Closed IDOR & User Isolation:** All bet slip tracking and BYOK settings resolve strictly from the active session (`cuID` / `auth()->id()`).
- **Inline Script Nonce Enforcement:** All `<script>` tags across all new views strictly include `script_nonce_attr()`, fully passing `InlineScriptNonceTest`.

---

## 3. Local Verification & Evidence

- **PHP Syntax (`php -l`):** 0 syntax errors across all migration, library, controller, and view files.
- **Form Certification Smoke Suite (`tests/smoke/form-certification-smoke.sh`):**
  - Route & Handler Contract Tests: **PASS 7 / 7**
  - Form Action Gap Ratchet: **PASS 1 / 1** (0 gaps added)
  - Platform Form Inventory Scan: **PASS 343, FAIL 0, BLOCKED 195**
- **Unit Test Suites (`vendor/bin/phpunit`):**
  - `MlbSplitsCalculatorTest`: **6 tests, 33 assertions (100% OK)**
  - `NhlSplitsCalculatorTest`: **5 tests, 25 assertions (100% OK)**
  - `SgpCorrelationEngineTest`: **4 tests, 22 assertions (100% OK)**
  - `SportsMlbNhlSgpControllerTest`: **8 tests, 28 assertions (100% OK)**
  - Full Sports Domain Suite: **96 tests, 565 assertions (100% OK)**
- **Git Status & Whitespace:** `git diff --check` clean.

---

## 4. Operator Deployment Packet

### Step 1: Deploy to Staging & Run Database Migration
```bash
cd /apps/TBI/repos/mymiwallet-next && git fetch origin && git checkout main && git pull origin main && \
MIGRATE='2026-11-27-000600_CreateSportsMlbNhlAndSgpTables' sudo -u www-data php /apps/TBI/repos/mymiwallet-next/scripts/ops/db/run-migrations.php && \
sudo bash scripts/ops/staging/mymi-staging.sh deploy main && \
sudo rm -f /apps/TBI/www/mymiwallet-staging/shared/writable/cache/FileLocatorCache && \
cd /apps/TBI/www/mymiwallet-staging/current && \
sudo -u www-data php -d display_errors=1 spark aiops:form:test --scan-all
```

### Step 2: Build & Activate Production Release
```bash
cd /apps/TBI/repos/mymiwallet-next && \
bash scripts/ops/deploy/mymi-release.sh build main && \
MIGRATE='2026-11-27-000600_CreateSportsMlbNhlAndSgpTables' bash scripts/ops/deploy/mymi-release.sh activate $(ls -td /apps/TBI/www/mymiwallet/releases/* | head -n 1 | xargs basename)
```
