#!/usr/bin/env bash
# Finds old copies of MyMI env/secret files left in old releases and backups on the
# prod host, and (only with --apply) shreds them. Prints paths only, never values.
#   bash clean-stale-env-copies.sh           # list what would be removed
#   bash clean-stale-env-copies.sh --apply   # shred the listed files
# Never touches: shared/.env, shared/chat.env, or anything inside the current release.
set -euo pipefail
BASE=/apps/TBI/www/mymiwallet
KEEP1="$BASE/shared/.env"
KEEP2="$BASE/shared/chat.env"
CURRENT="$(readlink -f "$BASE/current")"
APPLY=0; [ "${1:-}" = "--apply" ] && APPLY=1

sudo -v
LIST="$(mktemp)"; trap 'rm -f "$LIST"' EXIT
# Env-style files (by name) that hold one of the credential keys, under the app base dir.
sudo find "$BASE" \( -name node_modules -o -name vendor \) -prune -o -type f \
  \( -name '.env' -o -name '.env.*' -o -name '*.env' -o -name '*.env.*' -o -name '*.bak' -o -name '*backup*' -o -name 'env' -o -name 'env.*' \) \
  -print 2>/dev/null | while read -r f; do
    sudo grep -qsE '^\s*(database\.default\.password|DB_PASS|OPENAI_API_KEY|BASIC_AUTH_PASS|MYMI_USAGE_WEBHOOK_SECRET|REG_HEALTH_PASSWORD)\s*=' "$f" || continue
    real="$(readlink -f "$f")"
    [ "$real" = "$(readlink -f "$KEEP1")" ] && continue
    [ "$real" = "$(readlink -f "$KEEP2")" ] && continue
    case "$real" in "$CURRENT"/*) continue;; esac
    case "$f" in *.example|*.example.*|*.sample|*.dist) continue;; esac
    echo "$real"
  done | sort -u > "$LIST"

N="$(wc -l < "$LIST" | tr -d ' ')"
echo "Stale copies found: $N"
cat "$LIST"
if [ "$APPLY" -ne 1 ]; then
  echo
  echo "Nothing removed. Re-run with --apply to shred these $N files."
  exit 0
fi
while read -r f; do sudo shred -u "$f" && echo "shredded $f"; done < "$LIST"
echo "Done. Checking the live services still work:"
systemctl is-active mymi-wallet-chat.service
echo -n "chat health: "; curl -fsS http://127.0.0.1:8300/health || echo FAILED; echo
echo -n "site: "; curl -s -o /dev/null -w "%{http_code}\n" https://mymiwallet.com/
