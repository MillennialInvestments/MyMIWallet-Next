#!/usr/bin/env bash
# GTM-014: read-only check that the live DB has every table and column the
# live login, registration, reset, remember-me and 2FA code uses.
# Changes nothing. Prints names and counts only, never emails or other user data.
#
#   sudo bash auth-schema-check.sh
#
# Exit code 0 = everything the live auth path needs is present, 1 = something is missing.
set -euo pipefail
umask 077

ENV_FILE="${ENV_FILE:-/apps/TBI/www/mymiwallet/shared/.env}"
LIVE="$(sed -nE "s/^[[:space:]]*database\.default\.database[[:space:]]*=[[:space:]]*['\"]?([^'\"]*)['\"]?[[:space:]]*$/\1/p" "$ENV_FILE" | tail -1)"
[ -n "$LIVE" ] || { echo "Live DB name not found in $ENV_FILE" >&2; exit 1; }
q() { mysql -N "$LIVE" -e "$1"; }
qq() { q "$1" 2>/dev/null || echo "n/a"; } # a missing table above must not stop the report

missing=0
has_table() { [ "$(q "SELECT COUNT(*) FROM information_schema.TABLES WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='$1'")" = 1 ]; }
has_col()   { [ "$(q "SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='$1' AND COLUMN_NAME='$2'")" = 1 ]; }

need() { # need <table> <col> [<col> ...]  (required by the live code path)
  local t="$1"; shift
  if ! has_table "$t"; then echo "MISSING table   $t"; missing=$((missing + 1)); return; fi
  local gaps=""
  for c in "$@"; do has_col "$t" "$c" || gaps="$gaps $c"; done
  if [ -n "$gaps" ]; then echo "MISSING columns $t:$gaps"; missing=$((missing + 1)); else echo "ok              $t"; fi
}

info() { # info <table>  (not used by the live path; reported only)
  if has_table "$1"; then echo "present         $1 (rows: $(qq "SELECT COUNT(*) FROM \`$1\`"))"; else echo "absent          $1"; fi
}

echo "Live DB: $LIVE"
echo "== Used by the live auth path (AuthController + Myth/Auth models)"
need bf_users id email username password_hash reset_hash reset_at reset_expires activate_hash active force_pass_reset deleted status status_message
need users id email username password_hash reset_hash reset_expires activate_hash active deleted_at
need auth_logins id ip_address email user_id date success
need auth_tokens id selector hashedValidator user_id expires
need auth_reset_attempts id email ip_address user_agent token created_at
need auth_activation_attempts id ip_address user_agent token created_at
need auth_groups id name
need auth_groups_users group_id user_id
need bf_users_2fa user_id is_enabled secret_ciphertext secret_iv secret_tag backup_codes_hashes
need bf_user_ip_history id email ip_address

echo "== Shield tables (not used for login today, see docs/adr/0002)"
for t in auth_identities auth_remember_tokens auth_token_logins auth_permissions_users; do info "$t"; done

echo "== Account integrity (counts only)"
echo "users view type:                 $(qq "SELECT TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='users'")"
echo "visible accounts:                $(qq "SELECT COUNT(*) FROM bf_users WHERE COALESCE(deleted,0)=0")"
echo "visible without a password hash: $(qq "SELECT COUNT(*) FROM bf_users WHERE COALESCE(deleted,0)=0 AND (password_hash IS NULL OR password_hash='')")"
echo "visible duplicate-email groups:  $(qq "SELECT COUNT(*) FROM (SELECT LOWER(TRIM(email)) e FROM bf_users WHERE COALESCE(deleted,0)=0 AND email IS NOT NULL AND TRIM(email)<>'' GROUP BY LOWER(TRIM(email)) HAVING COUNT(*)>1) d")"
echo "unique index on bf_users.email:  $(qq "SELECT COUNT(*) FROM information_schema.STATISTICS WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='bf_users' AND COLUMN_NAME='email' AND NON_UNIQUE=0")"
echo "open reset tokens (unexpired):   $(qq "SELECT COUNT(*) FROM bf_users WHERE reset_hash IS NOT NULL AND reset_expires > NOW()")"
echo "reset tokens with no expiry:     $(qq "SELECT COUNT(*) FROM bf_users WHERE reset_hash IS NOT NULL AND reset_expires IS NULL")"
echo "successful logins, last 30 days: $(qq "SELECT COUNT(*) FROM auth_logins WHERE success=1 AND date > NOW() - INTERVAL 30 DAY")"
echo "failed logins, last 30 days:     $(qq "SELECT COUNT(*) FROM auth_logins WHERE success=0 AND date > NOW() - INTERVAL 30 DAY")"

if [ "$missing" -eq 0 ]; then echo "RESULT: OK, nothing the live auth path needs is missing"; else echo "RESULT: $missing gap(s) above"; exit 1; fi
