#!/usr/bin/env bash
# Restores tables that were left out of the 2026-06-28 DreamHost -> gq-ai01 import.
# Never overwrites a table that already exists in the live database.
#
#   sudo bash restore-lost-tables.sh            # stage: load the tables into a scratch DB, print row counts
#   sudo bash restore-lost-tables.sh --apply    # copy them from the scratch DB into the live DB
#
# Old DreamHost rows may hold zero dates, so loads run with a relaxed sql_mode.
# Prints table names and counts only, never row data. Uses root over the local socket (sudo mysql).
set -euo pipefail
umask 077

DUMP="${DUMP:-/apps/TBI/backups/dreamhost/mymiwallet-20260628-131430/mymiwallet-20260628-063257.sql.gz}"
ENV_FILE="${ENV_FILE:-/apps/TBI/www/mymiwallet/shared/.env}"
BACKUP_DIR="${BACKUP_DIR:-/var/backups/mymiwallet/mysql}"
SCRATCH="${SCRATCH_DB:-mymi_restore_lost}"
TABLES="${TABLES:-bf_users_wallet bf_users_wallet_transactions bf_users_trades bf_users_trades_configs bf_users_trades_logs bf_users_watchlist bf_weekly_stream_watchlist}"
MODE="${1:-stage}"

LIVE="$(sed -nE "s/^[[:space:]]*database\.default\.database[[:space:]]*=[[:space:]]*['\"]?([^'\"]*)['\"]?[[:space:]]*$/\1/p" "$ENV_FILE" | tail -1)"
[ -n "$LIVE" ] || { echo "Live DB name not found in $ENV_FILE" >&2; exit 1; }
[ "$SCRATCH" != "$LIVE" ] || { echo "Refusing: scratch DB name equals the live DB" >&2; exit 1; }

q() { mysql -N -e "$1"; }
exists() { [ "$(q "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema='$1' AND table_name='$2'")" = "1" ]; }

if [ "$MODE" = "stage" ]; then
  [ -r "$DUMP" ] || { echo "Cannot read $DUMP" >&2; exit 1; }
  echo "Live DB: $LIVE   Scratch DB: $SCRATCH"
  echo "Extracting: $TABLES"
  q "DROP DATABASE IF EXISTS \`$SCRATCH\`; CREATE DATABASE \`$SCRATCH\` CHARACTER SET utf8mb4;"
  # Keep the dump header (SET statements) and only the sections for the wanted tables.
  gzip -cd "$DUMP" | awk -v want="$TABLES" '
    BEGIN { n = split(want, a, " "); for (i = 1; i <= n; i++) w[a[i]] = 1; keep = 1 }
    /^-- Table structure for table `/ { match($0, /`[^`]+`/); t = substr($0, RSTART + 1, RLENGTH - 2); keep = (t in w); }
    /^-- (Temporary view|Final view) structure|^-- Dumping (routines|events)/ { keep = 0 }
    keep' \
  | sed -E '/^(USE|CREATE DATABASE) /d; s/DEFINER=`[^`]+`@`[^`]+`//g' \
  | mysql --init-command="SET SESSION sql_mode='NO_ENGINE_SUBSTITUTION'" "$SCRATCH"
  echo
  printf '%-32s %10s %s\n' table scratch_rows live_status
  for t in $TABLES; do
    if exists "$SCRATCH" "$t"; then r="$(q "SELECT COUNT(*) FROM \`$SCRATCH\`.\`$t\`")"; else r="(not in dump)"; fi
    if exists "$LIVE" "$t"; then s="ALREADY IN LIVE (will be skipped)"; else s="missing in live (will be restored)"; fi
    printf '%-32s %10s %s\n' "$t" "$r" "$s"
  done
  u="$(q "SELECT COUNT(*) FROM \`$SCRATCH\`.bf_users_wallet w LEFT JOIN \`$LIVE\`.bf_users u ON u.id = w.user_id WHERE u.id IS NULL" 2>/dev/null || echo '?')"
  echo
  echo "Wallets whose user_id has no matching live user: $u"
  echo "Nothing in $LIVE was changed. Review the counts, then run with --apply."
  exit 0
fi

[ "$MODE" = "--apply" ] || { echo "Unknown option: $MODE" >&2; exit 1; }
[ "$(q "SELECT COUNT(*) FROM information_schema.schemata WHERE schema_name='$SCRATCH'")" = "1" ] || { echo "Run the stage step first." >&2; exit 1; }
if ! find "$BACKUP_DIR" -maxdepth 1 -name '*.sql.gz*' -mmin -120 2>/dev/null | grep -q .; then
  echo "No backup newer than 2 hours in $BACKUP_DIR. Run mysql-backup.sh first." >&2; exit 1
fi

echo "Restoring into $LIVE ..."
for t in $TABLES; do
  exists "$SCRATCH" "$t" || { echo "  $t: not in dump, skipped"; continue; }
  if exists "$LIVE" "$t"; then echo "  $t: already in live, skipped"; continue; fi
  q "SET SESSION sql_mode='NO_ENGINE_SUBSTITUTION'; CREATE TABLE \`$LIVE\`.\`$t\` LIKE \`$SCRATCH\`.\`$t\`; INSERT INTO \`$LIVE\`.\`$t\` SELECT * FROM \`$SCRATCH\`.\`$t\`;"
  a="$(q "SELECT COUNT(*) FROM \`$SCRATCH\`.\`$t\`")"; b="$(q "SELECT COUNT(*) FROM \`$LIVE\`.\`$t\`")"
  [ "$a" = "$b" ] && echo "  $t: restored $b rows" || { echo "  $t: COUNT MISMATCH scratch=$a live=$b" >&2; exit 2; }
done
q "DROP DATABASE \`$SCRATCH\`;"
echo "Done. Scratch DB dropped. Check the site: curl -s -o /dev/null -w '%{http_code}\n' https://www.mymiwallet.com/"
