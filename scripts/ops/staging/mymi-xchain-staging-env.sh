#!/usr/bin/env bash
# MYMI-XCHAIN-001 staging switches, sanctions list and cron (staging only).
#
#   sudo bash scripts/ops/staging/mymi-xchain-staging-env.sh apply
#   sudo bash scripts/ops/staging/mymi-xchain-staging-env.sh rollback
#
# apply:    backs up staging shared/.env to .env.bak-xchain-<UTC time>, sets the
#           keys below (replacing an existing line or appending it), keeps the
#           file's owner and mode, writes /etc/cron.d/mymi-xchain-staging (daily
#           sanctions refresh) and loads the sanctions list once.
# rollback: restores the oldest .env.bak-xchain-* backup (the .env from before
#           the first apply), marks the backups as used, and removes the cron
#           file. Database tables are left in place.
#
# Never touches the live site: it refuses any folder other than staging.
set -u

STG_BASE="/apps/TBI/www/mymiwallet-staging"
ENV_FILE="$STG_BASE/shared/.env"
CRON_FILE="/etc/cron.d/mymi-xchain-staging"
MODE="${1:-}"

stop() { echo "STOP: $*"; echo "SEMANTIC_RESULT=BLOCKED_SAFETY"; exit 2; }

[ "$(id -u)" -eq 0 ] || stop "run with sudo"
[ -f "$ENV_FILE" ] || stop "no staging .env at $ENV_FILE"
case "$(readlink -f "$ENV_FILE")" in
  /apps/TBI/www/mymiwallet-staging/*) ;;
  *) stop "staging .env resolves outside the staging folder" ;;
esac

# Staging only: testnet money switches for the XCHAIN-001 features. Swaps stay
# quote-only. Values are not secrets.
KEYS=(
  "FEATURE_WALLETS=true"
  "FEATURE_MYMIGOLD_PURCHASES=true"
  "FEATURE_SANCTIONS_SCREENING=true"
  "FEATURE_SWAPS=true"
  "SWAPS_EXECUTE=false"
  "FEATURE_EXCHANGE_PAPER=true"
  "FEATURE_MYMICOIN_OFFERING=true"
  "MYMIGOLD_DAILY_CAP_USD=2000"
  "MYMIGOLD_DISCOUNT_BPS=1000"
)

if [ "$MODE" = "rollback" ]; then
  first="$(ls -1 "$ENV_FILE".bak-xchain-* 2>/dev/null | grep -v '\.used$' | sort | head -1)"
  [ -n "$first" ] || stop "no .env.bak-xchain-* backup to restore"
  cat "$first" > "$ENV_FILE"   # keeps owner and mode of the existing file
  for b in $(ls -1 "$ENV_FILE".bak-xchain-* | grep -v '\.used$'); do mv "$b" "$b.used"; done
  rm -f "$CRON_FILE"
  echo "PASS: restored $first into $ENV_FILE and removed $CRON_FILE"
  echo "SEMANTIC_RESULT=PASS"
  exit 0
fi

[ "$MODE" = "apply" ] || stop "usage: sudo bash $0 apply|rollback"

# Refuse a mainnet staging setup: these features must only meet test money.
net="$(sed -nE 's/^[[:space:]]*CRYPTO_PAY_NETWORK[[:space:]]*=[[:space:]]*["'\'']?([A-Za-z0-9_-]*).*/\1/p' "$ENV_FILE" | tail -1)"
case "$net" in
  ""|testnet) ;;
  *) stop "staging CRYPTO_PAY_NETWORK is '$net', expected testnet" ;;
esac

backup="$ENV_FILE.bak-xchain-$(date -u +%Y%m%dT%H%M%SZ)"
cp -p "$ENV_FILE" "$backup" || stop "could not back up $ENV_FILE"
echo "backup: $backup"

tmp="$(mktemp)"
cp "$ENV_FILE" "$tmp"
for kv in "${KEYS[@]}"; do
  k="${kv%%=*}"
  if grep -qE "^[[:space:]]*$k[[:space:]]*=" "$tmp"; then
    grep -vE "^[[:space:]]*$k[[:space:]]*=" "$tmp" > "$tmp.next"
    mv "$tmp.next" "$tmp"
  fi
  printf '%s\n' "$kv" >> "$tmp"
  echo "  set $k"
done
cat "$tmp" > "$ENV_FILE"   # keeps owner and mode of the existing file
rm -f "$tmp"

wr_user="$(stat -c %U "$STG_BASE/shared/writable")"
cat > "$CRON_FILE" <<CRON
# MYMI-XCHAIN-001 staging: refresh the OFAC sanctions address list daily at 03:00 UTC.
0 3 * * * $wr_user cd $STG_BASE/current && php spark compliance:update-sanctions >/dev/null 2>&1
CRON
chmod 644 "$CRON_FILE"
echo "  cron $CRON_FILE"

(cd "$STG_BASE/current" && sudo -u "$wr_user" php spark compliance:update-sanctions)
if [ -s "$STG_BASE/shared/writable/compliance/sanctions-addresses.txt" ]; then
  echo "PASS: sanctions list loaded ($(grep -cvE '^(#|$)' "$STG_BASE/shared/writable/compliance/sanctions-addresses.txt") addresses)"
else
  echo "WARN: sanctions list file is empty or missing; screening lets every address through until it loads"
fi

echo "SEMANTIC_RESULT=PASS"
