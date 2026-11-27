# Sports Intelligence Expansion: Soccer xG + College Matchups + Quant Model Personalization Reconciliation

**Date:** 2026-11-27  
**Branch:** `feature/sports-expansion-phase2-soccer-cfb-custom-quant`  
**Base Commit:** `7f1d239cf1fb`  
**Target:** `main`  
**Migration:** `2026-11-27-000700_CreateSportsSoccerCollegeAndQuantTables`  

---

## 1. Executive Summary

In continuation of the comprehensive Sports & Predictions Intelligence expansion, this release delivers **Phase 2**:
1. **Soccer Expected Goals (xG) & Poisson Match Engine**:
   - Computes team offensive attack and defensive resistance ratings against league-wide baselines.
   - Calculates home and away expected goals ($\lambda_{\text{home}}, \lambda_{\text{away}}$).
   - Generates 7x7 bivariate Poisson scoreline probability distribution matrix:
     $$P(k; \lambda) = \frac{\lambda^k e^{-\lambda}}{k!}$$
   - Produces 1X2 Match Probabilities (Home Win %, Draw %, Away Win %), Both Teams To Score (BTTS Yes/No %), Over/Under 2.5 goals %, and Clean Sheet probabilities.
   - Dedicated views under `/MyMISports/Soccer` and simulation endpoint `/MyMISports/Soccer/Simulate`.
2. **College Sports (NCAAF / NCAAB) Matchup Engine**:
   - Power ratings based on SP+ and KenPom style adjusted offensive and defensive efficiencies ($Eff_{\text{off}}, Eff_{\text{def}}$).
   - Dynamic tempo modeling (Pace possessions / plays per 40 min or 60 min game).
   - Home-court / home-field advantage scaling (+3.0 pts for NCAAB, +2.5 pts for NCAAF).
   - Normal CDF win probability calculation over projected spread and standard deviation ($\sigma \approx 14.0$ for football, $\sigma \approx 11.0$ for basketball):
     $$\Phi\left(\frac{\mu}{\sigma}\right) = \frac{1}{2}\left[1 + \text{erf}\left(\frac{\mu}{\sigma \sqrt{2}}\right)\right]$$
   - Dedicated views under `/MyMISports/College` and simulation endpoint `/MyMISports/College/Simulate`.
3. **1-Click SGP Bet Slip Tracker Integration**:
   - Direct bet slip submission from `/My-Bets/SGP` into the user's sports ledger (`bf_sports_user_bets`).
   - Automatically populates sport category (`SGP`), correlated legs, joint American odds, and bet status (`pending`).
4. **Custom Quantitative Edge Model Personalization**:
   - Interactive slider controls under `/My-Bets/Settings` for user-tunable model weights:
     - Form Weight (Recent 3 games streak/momentum)
     - Matchup Weight (Opponent defensive rating tier)
     - Home/Away Split Weight
     - Venue / Altitude Factor Weight
   - Dynamic normalizer ensuring weights sum to 100%, persisted per user in `bf_sports_user_settings`.
5. **Dashboard Navigation**:
   - Sidenav bar (`sidebar.php`): Added `Soccer xG Engine` and `College Sports` under `My Sports`.
   - Hub navigation bar (`_header.php`): Added `Soccer` and `College` tabs.

---

## 2. Regulatory & Non-Custodial Compliance

- **Analytical & Educational Scope:** Strictly non-custodial software and statistical modeling. No wagers placed or brokered. All outputs display standard financial/gaming disclaimers.
- **Fail-Closed IDOR & User Isolation:** All bet slip persistence and quantitative weight settings resolve strictly from the active authenticated session (`$this->cuID` or `auth()->id()`).
- **Inline Script Nonce Enforcement:** All view scripts use `<script<?= script_nonce_attr() ?>>`, fully passing `InlineScriptNonceTest`.

---

## 3. Local Verification & Evidence

- **PHP Syntax (`php -l`):** 0 syntax errors across all migration, library, controller, and view files.
- **Form Certification Smoke Suite (`tests/smoke/form-certification-smoke.sh`):**
  - Route & Handler Contract Tests: **PASS 7 / 7**
  - Form Action Gap Ratchet: **PASS 1 / 1** (0 gaps added)
  - Platform Form Inventory Scan: **PASS 345, FAIL 0, BLOCKED 195**
- **Unit Test Suites (`vendor/bin/phpunit`):**
  - `SoccerSplitsCalculatorTest`: **3 tests, 14 assertions (100% OK)**
  - `CollegeMatchupEngineTest`: **3 tests, 10 assertions (100% OK)**
  - `SportsSoccerAndCollegeControllerTest`: **5 tests, 23 assertions (100% OK)**
  - Full Sports Domain Suite: **107 tests, 612 assertions (100% OK)**
- **Git Status & Whitespace:** `git diff --check` clean.

---

## 4. Operator Deployment Packet

### Step 1: Deploy to Staging & Run Database Migration
```bash
cd /apps/TBI/repos/mymiwallet-next && git fetch origin && git checkout main && git pull origin main && \
php scripts/ops/db/run-migrations.php 2026-11-27-000700_CreateSportsSoccerCollegeAndQuantTables && \
sudo bash scripts/ops/staging/mymi-staging.sh deploy main && \
sudo rm -f /apps/TBI/www/mymiwallet-staging/shared/writable/cache/FileLocatorCache && \
cd /apps/TBI/www/mymiwallet-staging/current && \
sudo -u www-data php -d display_errors=1 spark aiops:form:test --scan-all
```

### Step 2: Build & Activate Production Release
```bash
cd /apps/TBI/repos/mymiwallet-next && \
bash scripts/ops/deploy/mymi-release.sh build main && \
MIGRATE='2026-11-27-000700_CreateSportsSoccerCollegeAndQuantTables' bash scripts/ops/deploy/mymi-release.sh activate $(ls -td /apps/TBI/www/mymiwallet/releases/* | head -n 1 | xargs basename)
```
