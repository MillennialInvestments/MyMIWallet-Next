#!/usr/bin/env bash
# Points the chat env's REG_HEALTH_* settings at healthcheck@mymiwallet.com.
# The password is typed hidden and never printed.
set -euo pipefail
CHAT_ENV=/apps/TBI/www/mymiwallet/current/chat/.env
EMAIL='healthcheck@mymiwallet.com'
USERNAME='healthcheck'
read -rsp "Site password for $EMAIL: " P1; echo; read -rsp "Again: " P2; echo
[ -n "$P1" ] && [ "$P1" = "$P2" ] || { echo "Empty or mismatched, nothing changed"; exit 1; }
case "$P1" in *"'"*|*'"'*|*' '*|*'#'*) echo "Avoid quotes, spaces and # in this password, nothing changed"; exit 1;; esac
set_key() { # key value
  if sudo grep -qE "^\s*$1\s*=" "$CHAT_ENV"; then
    K="$1" V="$2" sudo -E perl -pi -e 's/^\s*\Q$ENV{K}\E\s*=.*$/$ENV{K}=$ENV{V}/' "$CHAT_ENV"
  else
    printf '%s=%s\n' "$1" "$2" | sudo tee -a "$CHAT_ENV" >/dev/null
  fi
}
set_key REG_HEALTH_EMAIL "$EMAIL"
set_key REG_HEALTH_USERNAME "$USERNAME"
set_key REG_HEALTH_PASSWORD "$P1"
unset P1 P2
sudo grep -E '^REG_HEALTH_(EMAIL|USERNAME|PASSWORD)=' "$CHAT_ENV" | sed -E 's/^(REG_HEALTH_PASSWORD=).+/\1<set>/'
