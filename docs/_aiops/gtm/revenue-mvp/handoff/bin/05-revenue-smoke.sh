#!/usr/bin/env bash
# HTTP smoke against an ISOLATED base URL. Refuses production. Never charges a card.
SELF="$(cd "$(dirname "$0")" && pwd)"
. "$SELF/lib.sh"
: "${SMOKE_BASE_URL:?isolated/staging base URL required}"
case "$SMOKE_BASE_URL" in
  https://www.mymiwallet.com*|https://mymiwallet.com*) say "STOP PRODUCTION_URL_REJECTED"; exit 3;;
esac
check() { # path expected_code_regex label
  local code
  code="$(curl -s -o "$EVDIR/smoke-$3.body" -w '%{http_code}' --max-time 20 "$SMOKE_BASE_URL$1" 2>"$EVDIR/smoke-$3.err")"
  printf '%s\n' "$code" >"$EVDIR/smoke-$3.code"
  if printf '%s' "$code" | grep -q -E "$2"; then say "PASS $3 ($code) $1"; return 0; fi
  say "FAIL $3 ($code) $1"; return 1
}
fails=0
check "/" "^200$" home || fails=$((fails+1))
check "/Memberships" "^200$" plans || fails=$((fails+1))
check "/register" "^200$" register || fails=$((fails+1))
check "/login" "^200$" login || fails=$((fails+1))
check "/Legal/Terms-And-Conditions" "^200$" terms || fails=$((fails+1))
check "/Legal/Privacy-Policy" "^200$" privacy || fails=$((fails+1))
check "/Alerts/Preview/NVDA" "^200$" preview || fails=$((fails+1))
check "/User/Alerts" "^30[12]$" guest-alerts-redirect || fails=$((fails+1))
if grep -q "BETA CREDIT CARD" "$EVDIR/smoke-plans.body" 2>/dev/null; then say "FAIL beta card copy visible on plans"; fails=$((fails+1)); fi
if [ -z "${STRIPE_TEST_MODE_CONFIRMED:-}" ]; then
  say "BLOCKED_EXTERNAL_SANDBOX checkout/subscription/entitlement/cancel legs not run (no sandbox confirmed)"
  [ "$fails" -eq 0 ] && exit 8
  exit 1
fi
say "NOTE sandbox legs are implemented by REV-S004 tests; run phpunit tests/feature/RevenueCheckoutTest.php with provider test keys"
[ "$fails" -eq 0 ] && exit 0
exit 1
