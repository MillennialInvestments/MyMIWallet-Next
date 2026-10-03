#!/usr/bin/env bash
# Read-only rediscovery of revenue-path facts. Never mutates.
SELF="$(cd "$(dirname "$0")" && pwd)"
. "$SELF/lib.sh"
verify_worktree; rc=$?
if [ "$rc" -ne 0 ]; then exit "$rc"; fi
grep -n -E "Memberships|Alerts/Preview|Preview/Alert|register|login|Legal|Privacy|Terms" app/Config/Routes.php >"$EVDIR/routes-public.txt" 2>&1
grep -rn -i -E "stripe|braintree|paypal" composer.json app/Config/APISettings.php >"$EVDIR/payment-refs.txt" 2>&1
grep -rn "bf_users_subscriptions" app --include=*.php >"$EVDIR/subscription-table-refs.txt" 2>&1
grep -n "membership_fee" app/Modules/User/Controllers/WalletsController.php >"$EVDIR/client-price-refs.txt" 2>&1
grep -n -E "member(Starter|Basic|Pro|Premium)Fee" app/Config/SiteSettings.php >"$EVDIR/plan-prices.txt" 2>&1
grep -n "alerts.trade_alerts" -r app >"$EVDIR/alerts-gate-refs.txt" 2>&1
grep -c . "$EVDIR"/*.txt >"$EVDIR/discover-summary.txt" 2>&1
if grep -q "membership_fee" "$EVDIR/client-price-refs.txt" && grep -q "getPost" "$EVDIR/client-price-refs.txt"; then
  say "FINDING client-controlled membership fee still present (REV-S004 open)"
fi
say "PASS discover evidence=$EVDIR"
exit 0
