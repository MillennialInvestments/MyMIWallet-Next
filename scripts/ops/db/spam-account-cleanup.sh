#!/usr/bin/env bash
# Soft-delete spam signups: accounts that share an email with other accounts
# and were never used. Reversible. Run as root (sudo bash ...), it uses the
# local MySQL socket. Prints counts only, never emails or other user data.
#
#   sudo bash spam-account-cleanup.sh            # dry run: counts only, changes nothing
#   sudo bash spam-account-cleanup.sh --apply    # needs a completed backup from the last 2h
#   sudo bash spam-account-cleanup.sh --revert   # undo: restore the deleted flag from the audit table
#
# An account is flagged only if ALL of these hold:
#   - its email (trimmed, lower-cased) is shared with at least one other account
#   - it is not active (active <> 1) and not already deleted (bf_users.deleted)
#   - it never logged in successfully (auth_logins.success = 1)
#   - it has no wallet transactions and no trades
# Flagged accounts get bf_users.deleted = 1. The `users` view maps that to
# deleted_at, and UserModel uses soft deletes, so the app stops seeing them.
# Their rows and wallets stay in place.
set -euo pipefail
umask 077

ENV_FILE="${ENV_FILE:-/apps/TBI/www/mymiwallet/shared/.env}"
BACKUP_DIR="${BACKUP_DIR:-/var/backups/mymiwallet/mysql}"
AUDIT="bf_users_spam_cleanup_20261114"
MODE="${1:-dry-run}"

LIVE="$(sed -nE "s/^[[:space:]]*database\.default\.database[[:space:]]*=[[:space:]]*['\"]?([^'\"]*)['\"]?[[:space:]]*$/\1/p" "$ENV_FILE" | tail -1)"
[ -n "$LIVE" ] || { echo "Live DB name not found in $ENV_FILE" >&2; exit 1; }
q() { mysql -N "$LIVE" -e "$1"; }

for c in email active deleted; do
  [ "$(q "SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='bf_users' AND COLUMN_NAME='$c'")" = 1 ] \
    || { echo "bf_users.$c not found; refusing" >&2; exit 1; }
done

CANDIDATES="
  SELECT u.id FROM bf_users u
  JOIN (SELECT LOWER(TRIM(email)) e FROM bf_users WHERE email IS NOT NULL AND TRIM(email) <> ''
        GROUP BY LOWER(TRIM(email)) HAVING COUNT(*) > 1) k ON k.e = LOWER(TRIM(u.email))
  WHERE COALESCE(u.active, 0) <> 1
    AND COALESCE(u.deleted, 0) = 0
    AND NOT EXISTS (SELECT 1 FROM auth_logins l WHERE l.user_id = u.id AND l.success = 1)
    AND NOT EXISTS (SELECT 1 FROM bf_users_wallet_transactions t WHERE t.user_id = u.id)
    AND NOT EXISTS (SELECT 1 FROM bf_users_trades r WHERE r.user_id = u.id)"

counts() {
  echo "Live DB: $LIVE"
  echo "accounts total:              $(q "SELECT COUNT(*) FROM bf_users")"
  echo "already soft-deleted:        $(q "SELECT COUNT(*) FROM bf_users WHERE deleted = 1")"
  echo "flagged by the rules above:  $(q "SELECT COUNT(*) FROM ($CANDIDATES) c")"
  echo "  of which have a wallet row: $(q "SELECT COUNT(*) FROM ($CANDIDATES) c WHERE EXISTS (SELECT 1 FROM bf_users_wallet w WHERE w.user_id = c.id)")"
  echo "visible accounts after:      $(q "SELECT (SELECT COUNT(*) FROM bf_users WHERE COALESCE(deleted, 0) = 0) - (SELECT COUNT(*) FROM ($CANDIDATES) c)")"
}

case "$MODE" in
dry-run)
  counts
  echo "Nothing was changed. Review the counts, then run with --apply."
  ;;
--apply)
  if ! find "$BACKUP_DIR" -maxdepth 1 -name "${LIVE}_*.sha256" -mmin -120 2>/dev/null | grep -q .; then
    echo "No completed backup of $LIVE newer than 2 hours in $BACKUP_DIR. Run mysql-backup.sh first." >&2; exit 1
  fi
  # CREATE TABLE commits implicitly in MySQL, so create it before the transaction.
  q "CREATE TABLE IF NOT EXISTS $AUDIT (user_id BIGINT UNSIGNED NOT NULL PRIMARY KEY, prev_deleted TINYINT(1) NULL, flagged_at DATETIME NOT NULL) ENGINE=InnoDB"
  [ "$(q "SELECT COUNT(*) FROM $AUDIT")" = 0 ] \
    || { echo "$AUDIT already has rows, so this was applied before. Run --revert first to apply again." >&2; exit 1; }
  counts
  mysql "$LIVE" -e "
    START TRANSACTION;
    INSERT INTO $AUDIT (user_id, prev_deleted, flagged_at) SELECT u.id, u.deleted, NOW() FROM bf_users u JOIN ($CANDIDATES) c ON c.id = u.id;
    UPDATE bf_users u JOIN $AUDIT a ON a.user_id = u.id SET u.deleted = 1 WHERE COALESCE(u.deleted, 0) = 0;
    COMMIT;"
  echo "marked deleted now: $(q "SELECT COUNT(*) FROM bf_users u JOIN $AUDIT a ON a.user_id = u.id WHERE u.deleted = 1")"
  echo "Done. Undo with: sudo bash $0 --revert"
  ;;
--revert)
  [ "$(q "SELECT COUNT(*) FROM information_schema.TABLES WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='$AUDIT'")" = 1 ] \
    || { echo "$AUDIT not found; nothing to revert" >&2; exit 1; }
  mysql "$LIVE" -e "
    START TRANSACTION;
    UPDATE bf_users u JOIN $AUDIT a ON a.user_id = u.id SET u.deleted = a.prev_deleted;
    COMMIT;"
  q "RENAME TABLE $AUDIT TO ${AUDIT}_reverted_$(date -u +%Y%m%dT%H%M%SZ)"
  echo "Reverted. The deleted flag is back to its earlier value for every account this script marked."
  ;;
*)
  sed -n '2,17p' "$0"; exit 1 ;;
esac
