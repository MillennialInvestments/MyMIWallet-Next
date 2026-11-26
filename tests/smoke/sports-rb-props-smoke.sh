#!/usr/bin/env bash
# Smoke test: NFL running back prop analytics (MyMI Sports).
#
# Run on gq-ai01 against STAGING after deploying the merged commit with the
# sports migration, for example:
#   MIGRATE='2026-11-27-000100_CreateSportsPropAnalyticsTables' \
#     sudo bash scripts/ops/staging/mymi-staging.sh deploy <merge sha>
#   bash tests/smoke/sports-rb-props-smoke.sh
#
# What it checks (read-only except the sample rows it loads into bf_sports_*):
#   1. sports:import and sports:goldilocks are registered with spark
#   2. the three bf_sports_* tables exist and the bundled sample set imports (twice, idempotent)
#   3. vs the #1 rush defense the projection is lower than vs the #32 rush defense
#   4. a Goldilocks pick comes back, with the disclaimer and wagering=false
#   5. /MyMISports/NFL is routed and asks anonymous visitors to log in (not 404 / 500)
# Prints PASS/FAIL per check and exits 1 if anything failed ("FAIL 0" = good).
#
# Env: APP_DIR (default staging current), BASE_URL (default https://staging.mymiwallet.com),
#      STAGING_AUTH="user:pass" for the staging basic-auth (check 5 is skipped without it),
#      KEEP_SAMPLE=1 to leave the sample players in place for a browser check (default 1),
#      RUN_AS (default www-data).
set -u

APP_DIR="${APP_DIR:-/apps/TBI/www/mymiwallet-staging/current}"
BASE_URL="${BASE_URL:-https://staging.mymiwallet.com}"
RUN_AS="${RUN_AS:-www-data}"
KEEP_SAMPLE="${KEEP_SAMPLE:-1}"
OUT="${HOME}/sports-smoke-$(date -u +%Y%m%dT%H%M%SZ)"
mkdir -p "$OUT"
PASS=0; FAIL=0

ok()   { PASS=$((PASS+1)); echo "PASS  $*"; }
bad()  { FAIL=$((FAIL+1)); echo "FAIL  $*"; }
spark() { (cd "$APP_DIR" && sudo -u "$RUN_AS" php spark "$@") ; }

if [ ! -f "$APP_DIR/spark" ]; then
  echo "FAIL  APP_DIR has no spark: $APP_DIR"; echo "RESULT PASS $PASS FAIL 1"; exit 1
fi
echo "Sports RB props smoke  app=$APP_DIR  commit=$(cd "$APP_DIR" && cat REVISION 2>/dev/null || git rev-parse --short HEAD 2>/dev/null || echo unknown)  out=$OUT"

# 1. Commands registered (buffer output first; piping spark into grep -q breaks the pipe)
spark list > "$OUT/list.txt" 2>&1
if grep -q 'sports:import' "$OUT/list.txt" && grep -q 'sports:goldilocks' "$OUT/list.txt"; then ok "spark lists sports:import and sports:goldilocks"
else bad "sports commands missing from spark list (stale FileLocatorCache? sudo rm -f shared/writable/cache/FileLocatorCache)"; fi

# 2. Tables + idempotent sample import
spark sports:import --provider sample --json > "$OUT/import1.json" 2>&1
spark sports:import --provider sample --json > "$OUT/import2.json" 2>&1
php -r '
  $a = json_decode(preg_replace("/^[^{]*/s", "", file_get_contents($argv[1])), true);
  $b = json_decode(preg_replace("/^[^{]*/s", "", file_get_contents($argv[2])), true);
  if (($a["reason"] ?? "") === "tables_not_migrated") { echo "NOTABLES\n"; exit(2); }
  $okA = ($a["status"] ?? "") === "PASS" && ($a["counts"]["sample_players"] ?? 0) === 3;
  $okB = ($b["status"] ?? "") === "PASS" && ($b["game_logs_inserted"] ?? -1) === 0 && ($b["counts"]["game_logs"] ?? 0) >= 51;
  exit($okA && $okB ? 0 : 1);' "$OUT/import1.json" "$OUT/import2.json"
rc=$?
if [ $rc -eq 0 ]; then ok "bf_sports_* tables exist; sample import PASS and re-import inserted 0 duplicates"
elif [ $rc -eq 2 ]; then bad "tables not migrated: deploy with MIGRATE='2026-11-27-000100_CreateSportsPropAnalyticsTables'"
else bad "sample import did not PASS (see $OUT/import1.json, import2.json)"; fi

# 3 + 4. Matchup-aware projections and a Goldilocks pick
DEF_CSV="$APP_DIR/app/Modules/Sports/Data/sample_defense_ranks.csv"
TOP=$(awk -F, '$4==1 {print $3}' "$DEF_CSV"); BOT=$(awk -F, '$4==32 {print $3}' "$DEF_CSV")
LINES='rush_yds:70.5:-115:-105,rec_yds:24.5:-110:-110,rush_rec_yds:95.5:-110:-110'
spark sports:goldilocks --player Alpha --opponent "$TOP" --lines "$LINES" --json > "$OUT/vs_top.json" 2>&1
spark sports:goldilocks --player Alpha --opponent "$BOT" --lines "$LINES" --json > "$OUT/vs_bottom.json" 2>&1
php -r '
  $t = json_decode(preg_replace("/^[^{]*/s", "", file_get_contents($argv[1])), true);
  $b = json_decode(preg_replace("/^[^{]*/s", "", file_get_contents($argv[2])), true);
  if (!is_array($t) || !is_array($b) || ($t["status"] ?? "") !== "PASS") { echo "bad json\n"; exit(1); }
  $pt = $t["goldilocks"]["projections"]["rush_yds"]["projection"] ?? null;
  $pb = $b["goldilocks"]["projections"]["rush_yds"]["projection"] ?? null;
  printf("      rush yds projection vs #1 D %s = %s, vs #32 D %s = %s\n", $argv[3], $pt, $argv[4], $pb);
  printf("      vs #1:  %s\n      vs #32: %s\n", $t["goldilocks"]["verdict"], $b["goldilocks"]["verdict"]);
  $ok = $pt !== null && $pb !== null && $pt < $pb
     && ($t["goldilocks"]["opponent_tiers"]["rush_yds"] ?? "") === "top"
     && ($b["goldilocks"]["opponent_tiers"]["rush_yds"] ?? "") === "bottom"
     && count($t["goldilocks"]["candidates"]) === 6;
  exit($ok ? 0 : 3);' "$OUT/vs_top.json" "$OUT/vs_bottom.json" "$TOP" "$BOT"
[ $? -eq 0 ] && ok "projection drops vs top-10 rush D and rises vs bottom-10 rush D" || bad "matchup projections wrong (see $OUT/vs_top.json)"
php -r '
  $b = json_decode(preg_replace("/^[^{]*/s", "", file_get_contents($argv[1])), true);
  $best = $b["goldilocks"]["best"] ?? null;
  $ok = is_array($best) && $best["model_prob"] >= 0.55 && $best["model_prob"] <= 0.75 && $best["edge"] >= 0.03 && $best["ev_per_dollar"] > 0
     && str_contains($b["disclaimer"] ?? "", "1-800-GAMBLER") && ($b["provenance"]["wagering"] ?? true) === false;
  exit($ok ? 0 : 1);' "$OUT/vs_bottom.json"
[ $? -eq 0 ] && ok "Goldilocks pick inside 55-75% with edge >= 3 pts and +EV; disclaimer present; wagering=false" || bad "Goldilocks pick missing or outside rules (see $OUT/vs_bottom.json)"

# 5. Web route exists and is login-guarded
if [ -n "${STAGING_AUTH:-}" ]; then
  for path in /MyMISports/NFL /MyMISports/NFL/Player/1 "/MyMISports/NFL/API/Goldilocks?player_id=1"; do
    code=$(curl -s -o /dev/null -w '%{http_code}' -u "$STAGING_AUTH" "$BASE_URL$path")
    case "$code" in 301|302|303|307|401|403) ok "GET $path -> $code (routed, login required)";; *) bad "GET $path -> $code (expected a login redirect)";; esac
  done
else
  echo "SKIP  web route check (set STAGING_AUTH=user:pass from ~/mymi-staging-credentials.txt)"
fi

if [ "$KEEP_SAMPLE" != "1" ]; then
  spark sports:import --remove-sample --json > "$OUT/remove.json" 2>&1 && ok "sample rows removed" || bad "sample removal failed"
fi

echo "RESULT PASS $PASS FAIL $FAIL   (logs in $OUT)"
[ "$FAIL" -eq 0 ]
