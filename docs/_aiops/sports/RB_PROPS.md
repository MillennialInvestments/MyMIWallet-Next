# MyMI Sports: NFL running back props (Goldilocks)

Status: LIVE (#803, #805). Real-data import added in this change. Analytics only. No wagering, no money.

## What it does

- Stores per-game running back logs (rush att/yds/TD, targets, receptions, rec yds/TD) and opponent defense ranks.
- Tags every game with the opponent's tier, using the rank published **before** that week (no look-ahead), else the season rank:
  top = rank 1-10, mid = 11-22, bottom = 23-32. Rushing uses the rush-defense rank; receiving uses the rank vs RB receiving.
- Averages, medians and game counts for rushing, receiving and rush+rec yards: season, last 5, vs top / mid / bottom defenses.
- Projection for the next opponent = 50% tier average (shrunk toward the season average by 3 games of prior) + 30% last 5 + 20% season.
- Hit chance for a line = 65% normal model (spread floored at 12 / 8 / 15 yds) + 35% Laplace-smoothed tier hit rate.
- **Goldilocks pick:** hit chance between 55% and 75% (not too risky, not too safe), at least 3 points better than the no-vig sportsbook price, and positive EV. Highest EV wins; otherwise the verdict is "Pass".
- With no sportsbook lines, it suggests the highest over line and lowest under line that each hit about 65% of the time.

## Where

| Piece | Path |
|---|---|
| Pages (login required) | `/MyMISports/NFL`, `/MyMISports/NFL/Player/{id}?opponent=KC&market[]=rush_yds&line[]=65.5&over[]=-115&under[]=-105` |
| JSON | `/MyMISports/NFL/API/Goldilocks?player_id={id}&opponent=KC&lines=rush_yds:65.5:-115:-105` |
| Math | `app/Modules/Sports/Libraries/RbSplitsCalculator.php`, `GoldilocksEngine.php` |
| Storage | `SportsPropsService.php`, migration `2026-11-27-000100_CreateSportsPropAnalyticsTables` (`bf_sports_players`, `bf_sports_rb_game_logs`, `bf_sports_defense_ranks`) |
| Data | `Providers/StatsProviderInterface.php`, `CsvStatsProvider.php`, bundled fictional sample set in `app/Modules/Sports/Data/` |
| CLI | `php spark sports:import --provider sample`, `sports:import --logs FILE --defense FILE`, `sports:import --remove-sample --approve`, `sports:goldilocks --player Alpha --opponent KC --lines "rush_yds:65.5:-115:-105"` |
| Real data | `Providers/NflverseStatsProvider.php`, `PropLinesService.php`, `php spark sports:import --provider nflverse`, `php spark sports:lines` |
| Tests | `tests/unit/Sports/` (24 tests), `tests/smoke/sports-rb-props-smoke.sh` |

The sidebar's existing "My Sports" links (`/MyMISports`, `/MyMISports/NFL`, `/MyMISports/NBA`) now resolve; NBA goes to the NFL page until NBA work exists.

## Smoke test (staging, after merge)

One block, read-only checks first. Replace `<MERGE_SHA>` with the squash-merge commit on main before running.

```bash
cd /apps/TBI/repos/mymiwallet-next && git fetch -q origin && git log --oneline -1 origin/main
MIGRATE='2026-11-27-000100_CreateSportsPropAnalyticsTables' sudo bash scripts/ops/staging/mymi-staging.sh deploy <MERGE_SHA>
sudo rm -f /apps/TBI/www/mymiwallet-staging/shared/writable/cache/FileLocatorCache
bash /apps/TBI/www/mymiwallet-staging/current/tests/smoke/sports-rb-props-smoke.sh; echo "smoke exit=$?"
```

Good result: `RESULT PASS 4 FAIL 0` and `smoke exit=0`. To include the web-route check (3 more PASS lines, `PASS 7`), export `STAGING_AUTH=staging:<password>` from `~/mymi-staging-credentials.txt` first.

### Browser checklist (staging, signed in)

1. Open `/MyMISports/NFL`. Three "Sample RB … (sample)" players show with a "sample data" badge and the gambling disclaimer.
2. Click **Splits & Goldilocks** for Alpha. The "Averages by opponent defense rank" table shows bottom-10 rushing average above top-10.
3. Pick opponent **CHI** (sample #32 rush D), enter `rush yds / 70.5 / -115 / -105`, press **Find the Goldilocks bet**. Expect an OVER pick highlighted green.
4. Change the opponent to **CAR** (sample #1 rush D) and submit. Expect the projection to drop and the pick to flip to UNDER or Pass.
5. Leave the lines blank and submit. Expect "No sportsbook lines given" and suggested over/under lines per market.
6. Sign out and open `/MyMISports/NFL`. Expect the login page, not a 404.

Remove the sample players when done: `cd /apps/TBI/www/mymiwallet-staging/current && sudo -u www-data php spark sports:import --remove-sample --approve`.

## Real data

### Stats: nflverse (free, no key)

`php spark sports:import --provider nflverse [--season 2026]` downloads the free weekly player stats CSV
(`https://github.com/nflverse/nflverse-data/releases/download/stats_player/stats_player_week_{season}.csv`, about 5-9 MB) to
`writable/cache/nflverse/`, imports every RB row, and computes defense ranks from the same file: after each week every defense is
ranked by RB rushing yards per game allowed so far (1 = fewest), and separately by RB receiving yards. A week-N game uses the
ranks after week N-1 (no look-ahead); week 1 shows "rank unknown". Re-running updates rows in place. Use `--file PATH` to import a
file you already downloaded. License: CC BY 4.0 (checked against the nflverse-data LICENSE); pages show "Stats: nflverse (CC BY 4.0)".
Checked 2026-11-27 against the real 2026 file (weeks 1-12): 149 RBs, 941 game logs, 32 defenses, import under 1 second.

Cost-efficient schedule: once a day during the season (nflverse refreshes after games). One request per run.

### Sportsbook lines: The Odds API (optional, key in .env)

`php spark sports:lines` fetches RB prop lines (`player_rush_yds`, `player_reception_yds`, `player_rush_reception_yds`;
DraftKings then FanDuel) into `bf_sports_prop_lines` (migration `2026-11-27-000200_CreateSportsPropLinesTable`).
Does nothing unless `ODDS_API_KEY` is set in `.env`. The events list is free; each game costs about 3 credits.
Guards: only games starting in the next `--days 7`, at most `--max-events 16`, stops when remaining credits would fall under
`--reserve 25`, skips games already started. One run a week for a full slate is about 48 credits, so the free 500-credit plan
covers roughly two runs a week. The key is never logged (errors mask `apiKey=`).

With lines stored, a player page with no matchup typed in pre-fills the next opponent and the book's lines, and `/MyMISports/NFL`
lists "This week's Goldilocks picks". Typing your own lines still works and overrides them. Book names are matched to nflverse
names ignoring case, punctuation and Jr/Sr/II/III suffixes.

### CSV

Import a CSV export (columns in `CsvStatsProvider.php`; sample files show the format) with `sports:import --logs FILE --defense FILE --provider csv`.

## Gates and risks

- **Legal:** this is educational analytics. Taking, placing or brokering wagers, paid picks, or affiliate sportsbook links need a separate legal/compliance review per state before any build. Not enabled here.
- **Exposed key:** `app/Libraries/MyMISports.php` had an API-Sports key hardcoded in this public repo. This change reads `API_SPORTS_KEY` from `.env` instead, but the old key is in git history: **rotate it at api-sports.io**.
- Model weights are heuristics, not back-tested. Treat picks as a research aid.
- Production: deploy through `mymi-release.sh` with the named migrations in `MIGRATE=` after staging passes. Never plain `spark migrate`.

## Rollback

Revert the PR. Tables are additive; to drop them run the migration's `down()` (drops only `bf_sports_*`), or leave them unused.
