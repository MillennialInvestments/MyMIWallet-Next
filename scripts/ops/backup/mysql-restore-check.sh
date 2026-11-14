#!/usr/bin/env bash
# Proves the newest backup restores (GTM-060). Loads it into a throwaway database
# (default mymi_restore_check), compares table counts and a few row counts with
# the live database, then drops the throwaway database. Never touches the live DB.
#
#   sudo bash mysql-restore-check.sh                       # newest backup
#   sudo bash mysql-restore-check.sh /path/to/file.sql.gz  # a specific one
#
# Needs a MySQL account that can CREATE/DROP the scratch database. By default
# this uses root over the local socket (sudo mysql).
set -euo pipefail
umask 077

ENV_FILE="${ENV_FILE:-/apps/TBI/www/mymiwallet/shared/.env}"
BACKUP_DIR="${BACKUP_DIR:-/var/backups/mymiwallet/mysql}"
SCRATCH="${RESTORE_DB:-mymi_restore_check}"
MYSQL=(${RESTORE_MYSQL:-mysql})

LIVE="$(sed -nE "s/^[[:space:]]*database\.default\.database[[:space:]]*=[[:space:]]*['\"]?([^'\"]*)['\"]?[[:space:]]*$/\1/p" "$ENV_FILE" | tail -1)"
[ -n "$LIVE" ] || { echo "Live DB name not found in $ENV_FILE" >&2; exit 1; }
[ "$SCRATCH" != "$LIVE" ] || { echo "Refusing: scratch DB name equals the live DB" >&2; exit 1; }

FILE="${1:-$(ls -1t "$BACKUP_DIR"/*.sql.gz 2>/dev/null | head -1 || true)}"
[ -n "$FILE" ] && [ -r "$FILE" ] || { echo "No backup file found in $BACKUP_DIR" >&2; exit 1; }
if [ -r "$FILE.sha256" ]; then (cd "$(dirname "$FILE")" && sha256sum -c --quiet "$(basename "$FILE").sha256"); fi

echo "Restoring $(basename "$FILE") into $SCRATCH ..."
"${MYSQL[@]}" -e "DROP DATABASE IF EXISTS \`$SCRATCH\`; CREATE DATABASE \`$SCRATCH\` CHARACTER SET utf8mb4;"
trap '"${MYSQL[@]}" -e "DROP DATABASE IF EXISTS \`$SCRATCH\`;" || true' EXIT
START=$(date +%s)
gzip -cd "$FILE" | "${MYSQL[@]}" "$SCRATCH"
SECS=$(( $(date +%s) - START ))

count_tables() { "${MYSQL[@]}" -N -e "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema='$1'"; }
LT="$(count_tables "$LIVE")"; RT="$(count_tables "$SCRATCH")"
echo "tables: live=$LT restored=$RT (restore took ${SECS}s)"

FAIL=0
[ "$RT" -gt 0 ] || FAIL=1
for t in bf_users bf_users_wallet bf_users_wallet_transactions bf_auction_balances; do
  have="$("${MYSQL[@]}" -N -e "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema='$SCRATCH' AND table_name='$t'")"
  [ "$have" = "1" ] || { echo "  $t: missing from restore"; continue; }
  r="$("${MYSQL[@]}" -N -e "SELECT COUNT(*) FROM \`$SCRATCH\`.\`$t\`")"
  l="$("${MYSQL[@]}" -N -e "SELECT COUNT(*) FROM \`$LIVE\`.\`$t\`" 2>/dev/null || echo '?')"
  echo "  $t: restored=$r live_now=$l"
  [ "$r" -gt 0 ] || [ "$l" = "0" ] || FAIL=1
done

if [ "$FAIL" -ne 0 ]; then echo "RESTORE CHECK FAILED"; exit 2; fi
echo "RESTORE CHECK PASSED"
