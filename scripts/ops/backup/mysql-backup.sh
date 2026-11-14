#!/usr/bin/env bash
# Nightly MyMI Wallet database backup (GTM-060).
# Reads DB settings from the live env file without printing them, dumps with
# --single-transaction (no table locks on InnoDB), compresses, optionally
# encrypts, and prunes old copies.
#
#   sudo bash mysql-backup.sh                 # one backup now
#   BACKUP_DIR=/srv/backups sudo bash mysql-backup.sh
#
# Optional:
#   BACKUP_AGE_RECIPIENT=age1...   encrypt with age (recommended for any offsite copy)
#   BACKUP_RCLONE_REMOTE=remote:bucket/mymi   copy each new file offsite with rclone
#   BACKUP_KEEP_DAYS=14            local retention (default 14)
set -euo pipefail
umask 077

ENV_FILE="${ENV_FILE:-/apps/TBI/www/mymiwallet/shared/.env}"
BACKUP_DIR="${BACKUP_DIR:-/var/backups/mymiwallet/mysql}"
KEEP_DAYS="${BACKUP_KEEP_DAYS:-14}"

envval() { # read KEY = value from the env file, strip quotes; never echoed
  sed -nE "s/^[[:space:]]*$1[[:space:]]*=[[:space:]]*['\"]?([^'\"]*)['\"]?[[:space:]]*$/\1/p" "$ENV_FILE" | tail -1
}

[ -r "$ENV_FILE" ] || { echo "Cannot read $ENV_FILE" >&2; exit 1; }
DB_HOST="$(envval 'database\.default\.hostname')"; DB_HOST="${DB_HOST:-localhost}"
DB_NAME="$(envval 'database\.default\.database')"
DB_USER="$(envval 'database\.default\.username')"
DB_PASS="$(envval 'database\.default\.password')"
DB_PORT="$(envval 'database\.default\.port')"; DB_PORT="${DB_PORT:-3306}"
[ -n "$DB_NAME" ] && [ -n "$DB_USER" ] || { echo "DB name/user missing in $ENV_FILE" >&2; exit 1; }

mkdir -p "$BACKUP_DIR"
CNF="$(mktemp)"; trap 'rm -f "$CNF"' EXIT
printf '[client]\nhost=%s\nport=%s\nuser=%s\npassword=%s\n' "$DB_HOST" "$DB_PORT" "$DB_USER" "$DB_PASS" > "$CNF"
unset DB_PASS

STAMP="$(date -u +%Y%m%dT%H%M%SZ)"
OUT="$BACKUP_DIR/${DB_NAME}_${STAMP}.sql.gz"

mysqldump --defaults-extra-file="$CNF" --single-transaction --quick --routines --triggers \
  --events --hex-blob --set-gtid-purged=OFF --no-tablespaces "$DB_NAME" 2>"$BACKUP_DIR/.last-error" \
  | gzip -9 > "$OUT.partial"
mv "$OUT.partial" "$OUT"
rm -f "$BACKUP_DIR/.last-error"

# Sanity: a complete dump ends with the "Dump completed" trailer.
if ! gzip -cd "$OUT" | tail -c 200 | grep -q 'Dump completed'; then
  echo "Backup looks incomplete: $OUT" >&2; exit 2
fi

if [ -n "${BACKUP_AGE_RECIPIENT:-}" ]; then
  age -r "$BACKUP_AGE_RECIPIENT" -o "$OUT.age" "$OUT" && rm -f "$OUT" && OUT="$OUT.age"
fi
sha256sum "$OUT" > "$OUT.sha256"

if [ -n "${BACKUP_RCLONE_REMOTE:-}" ]; then
  rclone copy "$OUT" "$BACKUP_RCLONE_REMOTE/" && rclone copy "$OUT.sha256" "$BACKUP_RCLONE_REMOTE/"
fi

find "$BACKUP_DIR" -maxdepth 1 -type f -name "${DB_NAME}_*.sql.gz*" -mtime +"$KEEP_DAYS" -delete

SIZE="$(du -h "$OUT" | cut -f1)"
echo "backup ok: $(basename "$OUT") ($SIZE)"
