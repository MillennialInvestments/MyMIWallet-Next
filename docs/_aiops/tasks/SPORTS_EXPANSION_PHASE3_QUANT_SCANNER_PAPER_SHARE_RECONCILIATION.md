# Sports Expansion Phase 3: Quant Props, +EV Radar Scanner, Paper Trading, Polymarket Ingestion & Social Sharing

## 1. Overview & Objective
Phase 3 expansion builds out key analytical, gamification, and social sharing workflows across the MyMI Sports, Betting, and Prediction Markets ecosystem:
1. **Personalized Quant Weights in Live Player Props:** Wire user custom weights (`quant_form_weight`, `quant_matchup_weight`, `quant_home_away_weight`, `quant_venue_weight`) directly into `SportsPropsService` (NFL, NBA, MLB, NHL) to dynamically project personalized hit rates, edge shifts, and dominant drivers.
2. **Automated Daily +EV & SGP Arbitrage Scanner ("Value Finder"):** Multi-sport radar identifying positive expected value correlated SGPs ($r \ge 0.35$ or $+EV \ge 3\%$) and cross-book arbitrage opportunities, with dedicated UI at `/My-Bets/Value-Finder` and CLI command `php spark sports:ev:scan`.
3. **Gamified Paper Trading for Prediction Markets (`/My-Predictions`):** Dual-mode toggle allowing users to toggle between Web3 Self-Custody USDC and Paper Trading with 1,000 virtual credits, instant execution, balance reset, and Gamification XP (+15 XP) integration into `bf_sports_gamified_leaderboard`.
4. **Prediction Markets Public Live Ingestion Spark Command:** `php spark sports:predictions:sync` connecting to the Polymarket Gamma API with resilient local fallback and duplicate resolution.
5. **Branded Sharable Visual Bet Slips:** Interactive modal on `/My-Bets` generating copyable Markdown/Text snippets for X/Telegram/Discord and HTML5 Canvas rendering downloadable PNG cards with compliance watermarks.

---

## 2. Governance & Invariants
- **Non-Custodial Invariant:** All prediction market interactions are educational/analytical or direct client-side signing in user self-custody wallets. No keys or pooled funds are managed server-side.
- **Fail-Closed IDOR Protection:** User settings, paper balances, and order placements resolve strictly from `$this->cuID` or `auth()->id()`.
- **Script Nonce Integrity:** All script elements use `<script<?= script_nonce_attr() ?>>` for CSP compliance.
- **Enforced Ratchet:** `tests/baseline/form-action-gaps.txt` remains shrink-only. Smoke test verified with 361 PASS, 0 FAIL.

---

## 3. Database Migration
- **File:** `app/Database/Migrations/2026-11-28-000400_CreateSportsPaperTradingAndScannerTables.php`
- **Tables/Columns:**
  - `bf_sports_prediction_orders`: Adds column `is_paper_trade` (`TINYINT(1) DEFAULT 0`).
  - `bf_sports_user_settings`: Adds column `paper_balance_credits` (`DECIMAL(12,2) DEFAULT 1000.00`).
  - `bf_sports_ev_scans`: New table for caching +EV and arbitrage scanner findings with JSON payload, edge percentage, and TTL expiration.

---

## 4. Verification & Smoke Test Receipts
- **Unit Tests:**
  - `tests/unit/Sports/QuantProjectionWeightsTest.php` (PASS: 3 tests, 10 assertions)
  - `tests/unit/Sports/SportsValueFinderServiceTest.php` (PASS: 3 tests, 79 assertions)
  - `tests/unit/Sports/PredictionMarketsPaperTradingTest.php` (PASS: 3 tests, 15 assertions)
  - Full Sports Suite (`tests/unit/Sports/`): 116 tests, 710 assertions (PASS)
  - `tests/unit/Views/InlineScriptNonceTest.php` (PASS: 2 tests, 3 assertions)
- **Form Certification Smoke Test (`tests/smoke/form-certification-smoke.sh`):**
  - PASS: 361 (Required: >= 317)
  - FAIL: 0 (Required: <= 0)
- **Whitespace Check:** `git diff --check` passed clean.
- **PHP Lint:** 0 syntax errors across all modified and untracked files.
