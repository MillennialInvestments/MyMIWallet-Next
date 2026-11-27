# MYMI-GTM-072: Sports Dashboard Advanced Tabs, Bet Tracker & BYOK Settings

## 1. Executive Summary & Objective

- **Task Key**: `MYMI-GTM-072`
- **Domain**: Sports Analytics Hub & Personal Betting Bankroll Intelligence
- **Lead Agent**: Gemini / Antigravity (Implementation Worker)
- **Objective**: Maximize the MyMI Sports & Betting Analytics Hub with comprehensive functionality across advanced tabs:
  1. **NFL Intelligence & Matchups** (`/MyMISports/NFL`): Expanded running back, quarterback, and receiver splits by defensive tier, and head-to-head game total and spread simulators.
  2. **NBA Intelligence & Matchups** (`/MyMISports/NBA`): Quantitative player prop distributions by defensive rank (Points, Rebounds, Assists, 3-Pointers, Steals+Blocks, PRA), opponent simulation, and Goldilocks +EV pick generation.
  3. **Bet Tracker & Bankroll Management** (`/MyMISports/Tracker`): Private personal ledger of sports bet slips across all books (DraftKings, FanDuel, BetMGM, Caesars, Kalshi, Polymarket) with metrics (Total Staked, Net P&L, Win Rate %, ROI %, Open Risk, and Closing Line Value / CLV Edge %).
  4. **Line Shopping & Multi-Book Odds Matrix** (`/MyMISports/Odds`): Real-time comparison across DraftKings, FanDuel, BetMGM, and Caesars to highlight best price, key number advantages, and cross-book line discrepancies.
  5. **Quantitative Betting Calculators** (`/MyMISports/Calculators`): Interactive client-side and backend models for Kelly Criterion bankroll sizing (Full, Half, Quarter), Two-Way Arbitrage & Hedge allocations, and No-Vig Fair Odds / +EV calculation.
  6. **Integrations & User BYOK Settings** (`/MyMISports/Settings`): Bring Your Own Key (BYOK) for personal The Odds API and API-Sports keys (encrypted at rest with `StoredSecret::seal`), CSV bet slips import/export, and safe non-custodial sportsbook sync guidance.

---

## 2. US Regulatory & Architectural Compliance ("Brick A" & AGENTS.md)

1. **Non-Custodial Invariant & CFAA Compliance**:
   - MyMI Wallet is strictly an educational research and personal accounting platform.
   - **No wagers are placed, accepted, or brokered on the platform.**
   - Third-party sportsbook credentials (passwords, session cookies) are **never requested or stored**. User synchronization is strictly non-custodial via personal BYOK API keys and user-controlled CSV exports/imports.
2. **SEC / FINRA Publisher Exemption (*Lowe v. SEC*)**:
   - Analytical models (Goldilocks +EV, Kelly Criterion, team matchup simulations) are educational tools.
   - Every view and API response carries the mandatory disclaimer:
     `Educational analytics only, not betting advice. MyMI Wallet does not accept, place or broker wagers. Sports betting is regulated by each state; check your local laws. Gambling problem? Call 1-800-GAMBLER.`
3. **Fail-Closed IDOR Protection**:
   - All bet ledger queries, updates, deletions, and user BYOK settings resolve strictly from the active authenticated session (`$this->cuID` / `auth()->id()`), never trusting request parameters.
4. **At-Rest Secret Encryption (SEC-KEYS-001)**:
   - User BYOK API keys are encrypted at rest with CodeIgniter's encrypter using `StoredSecret::seal()` (`enc:v1:<base64>`).

---

## 3. Database Schema Mutations

- **Migration**: `app/Database/Migrations/2026-11-27-000400_CreateSportsBetTrackerAndUserSettingsTables.php`
  - `bf_sports_players`: Added `sport` column (`VARCHAR(16) DEFAULT 'NFL'`).
  - `bf_sports_user_bets`: Private ledger table storing user bet slips with fields `id`, `user_id`, `placed_at`, `sportsbook`, `sport`, `league`, `bet_type`, `event_description`, `selection`, `line`, `odds`, `stake_amount`, `potential_payout`, `status`, `closing_line`, `clv_edge`, `pnl_amount`, `notes`.
  - `bf_sports_user_settings`: User configuration table storing `user_id`, `odds_api_key_encrypted`, `api_sports_key_encrypted`, `default_unit_size`, `default_bankroll`, `bankroll_currency`.
  - `bf_sports_nba_game_logs`: NBA game boxscores storing `player_id`, `season`, `game_date`, `opponent`, `home_away`, `minutes`, `pts`, `reb`, `ast`, `threes`, `steals`, `blocks`, `turnovers`.
  - `bf_sports_nba_defense_ranks`: NBA defensive rankings by stat category (`pts_def_rank`, `reb_def_rank`, `ast_def_rank`, `three_def_rank`, `def_rating_rank`).

---

## 4. Test Verification & Code Quality

- **Unit Tests**:
  - `tests/unit/Sports/BettingCalculatorsTest.php`: 6 tests, 38 assertions passing (Odds conversions, payout, Kelly sizing, 2-way arbitrage, no-vig, CLV edge).
  - `tests/unit/Sports/NbaSplitsCalculatorTest.php`: 3 tests, 23 assertions passing (Tiers, market values, splits).
  - `tests/unit/Sports/SportsBetTrackerServiceTest.php`: 5 tests, 29 assertions passing (CRUD, summary metrics, fail-closed IDOR isolation, BYOK encryption, CSV import/export).
  - `tests/unit/Sports/SportsAdvancedTabsTest.php`: 4 tests, 25 assertions passing (Unauthenticated redirect guards, NBA reports, multi-book matrix, calculator endpoints).
  - `tests/unit/Views/InlineScriptNonceTest.php`: 2 tests, 3 assertions passing (CSP script nonce compliance).
- **Module Test Suite**: 56 tests, 376 assertions passing in `tests/unit/Sports/`.
- **Full Application Regression Suite**: **945 tests, 6,474 assertions passing** across the entire codebase.
- **PHP Lint (`php -l`)**: 0 syntax errors detected across all modified files and views.
- **Whitespace & Formatting (`git diff --check`)**: Clean.
