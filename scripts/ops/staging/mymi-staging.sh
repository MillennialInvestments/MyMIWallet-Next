#!/usr/bin/env bash
# STAGING-001: MyMI Wallet staging site on gq-ai01 (https://staging.mymiwallet.com).
#
#   sudo bash mymi-staging.sh check         # read-only: disks, backup, nginx, DNS. Changes nothing.
#   sudo bash mymi-staging.sh setup         # everything below, in order, then a smoke test
#   sudo bash mymi-staging.sh db-refresh    # reload the newest nightly backup into the staging DB and scrub it
#   sudo bash mymi-staging.sh deploy [ref]  # build <ref> (default main) into staging and switch to it
#   sudo bash mymi-staging.sh set-password tester|admin  # pick a test-account password (kept across db-refresh)
#   sudo bash mymi-staging.sh perms         # let nginx/php-fpm read the staging files, then smoke test
#   sudo bash mymi-staging.sh vhost         # nginx site with a password prompt + noindex, then HTTPS if DNS is up
#   sudo bash mymi-staging.sh form-test [limit]  # submit every safe form on staging, signed in as staging-tester
#   sudo bash mymi-staging.sh revision      # print the git sha staging is running
#   sudo bash mymi-staging.sh smart         # drive health only (SMART, through RAID cards too)
#
# What it never does: write to the live database, the live site folder, the
# live .env, or the live nginx site. It reads the live .env (for DB host/port
# and safe app settings) and the newest backup file. Staging gets its own DB,
# its own DB user, its own .env with NO payment, mail, broker, Discord or AI
# keys, every FEATURE_* money switch off, and mail pointed at nothing.
#
# Secrets it creates (DB password, site password, test-account passwords) go
# to ~/mymi-staging-credentials.txt (mode 600) of the user who ran sudo.
set -euo pipefail
umask 027

HOST="${STAGING_HOST:-staging.mymiwallet.com}"
PROD_BASE="${PROD_BASE:-/apps/TBI/www/mymiwallet}"
STG_BASE="${STG_BASE:-/apps/TBI/www/mymiwallet-staging}"
REPO="${REPO:-/apps/TBI/repos/mymiwallet-next}"
BACKUP_DIR="${BACKUP_DIR:-/var/backups/mymiwallet/mysql}"
STG_DB="${STG_DB:-mymiwallet_staging}"
STG_DB_USER="${STG_DB_USER:-mymi_staging}"
NGINX_SITE="${NGINX_SITE:-/etc/nginx/sites-available/$HOST.conf}"
HTPASSWD="${HTPASSWD:-/etc/nginx/mymi-staging.htpasswd}"
CMD="${1:-}"; ARG="${2:-}"

die()  { echo "ERROR: $*" >&2; exit 1; }
say()  { echo "--- $*"; }
[ "$(id -u)" = 0 ] || die "run with sudo: sudo bash $0 $CMD"
OP_USER="${SUDO_USER:-root}"
OP_HOME="$(getent passwd "$OP_USER" | cut -d: -f6)"
CREDS="$OP_HOME/mymi-staging-credentials.txt"
as_op() { sudo -H -u "$OP_USER" "$@"; }
MYSQL=(mysql)

envval() { # envval <file> <key>  (key with dots, value unquoted)
  local k; k="$(printf '%s' "$2" | sed 's/[.]/\\./g')"
  sed -nE "s/^[[:space:]]*$k[[:space:]]*=[[:space:]]*['\"]?([^'\"]*)['\"]?[[:space:]]*$/\1/p" "$1" 2>/dev/null | tail -1
}
LIVE_DB="$(envval "$PROD_BASE/shared/.env" database.default.database)"
[ -n "$LIVE_DB" ] || die "live DB name not found in $PROD_BASE/shared/.env"
[ "$STG_DB" != "$LIVE_DB" ] || die "refusing: staging DB name equals the live DB"
case "$STG_BASE" in "$PROD_BASE"|"$PROD_BASE"/*) die "refusing: staging folder is inside the live folder";; esac

cred_get() { [ -r "$CREDS" ] && sed -nE "s/^$1=(.*)$/\1/p" "$CREDS" | tail -1 || true; }
cred_set() { # keeps one line per key
  touch "$CREDS"; chown "$OP_USER" "$CREDS"; chmod 600 "$CREDS"
  grep -v "^$1=" "$CREDS" > "$CREDS.tmp" || true
  printf '%s=%s\n' "$1" "$2" >> "$CREDS.tmp"; mv "$CREDS.tmp" "$CREDS"; chown "$OP_USER" "$CREDS"; chmod 600 "$CREDS"
}
newpw() { openssl rand -base64 30 | tr -dc 'A-Za-z0-9' | head -c 24; }
# MySQL validate_password (MEDIUM/STRONG) wants upper, lower, digit and a special character.
newdbpw() { printf '%s-Xz9_%s' "$(newpw)" "$(newpw | head -c 8)"; }
newest_backup() { ls -1t "$BACKUP_DIR"/*.sql.gz 2>/dev/null | head -1 || true; }

# ---------------------------------------------------------------- check
storage_ok=1
# SMART health of one disk. Disks behind a RAID card (HP Smart Array "cciss",
# LSI "megaraid") need -d <type>,N per physical drive, so walk N until one is missing.
smart_disk() {
  local d="$1" out typ n h found=0
  out="$(smartctl -H "$d" 2>&1 || true)"
  h="$(printf '%s\n' "$out" | grep -iE 'overall-health|SMART Health Status' | sed 's/.*: *//' | head -1)"
  if [ -n "$h" ]; then echo "  SMART $d: $h"; [ "$h" = PASSED ] || [ "$h" = OK ] || storage_ok=0; return; fi
  typ="$(printf '%s\n' "$out" | grep -oE "requires option '-d [a-z]+" | awk '{print $NF}' | head -1)"
  [ -n "$typ" ] || { echo "  SMART $d: unknown ($(printf '%s' "$out" | tail -1 | cut -c1-120))"; return; }
  for n in $(seq 0 31); do
    out="$(smartctl -H -i -d "$typ,$n" "$d" 2>&1 || true)"
    h="$(printf '%s\n' "$out" | grep -iE 'overall-health|SMART Health Status' | sed 's/.*: *//' | head -1)"
    [ -n "$h" ] || continue
    found=$((found + 1))
    echo "  SMART $d $typ,$n: $h  ($(printf '%s\n' "$out" | grep -iE '^(Device Model|Product|Serial Number|User Capacity)' | sed 's/^[^:]*: *//' | tr '\n' ' ' | cut -c1-90))"
    [ "$h" = PASSED ] || [ "$h" = OK ] || storage_ok=0
  done
  [ "$found" -gt 0 ] || echo "  SMART $d: behind a $typ controller, but no drive answered on $typ,0-31"
}

check() {
  local blockers=0 f
  echo "Host: $HOST   live DB: $LIVE_DB   staging DB: $STG_DB"
  say "storage health (incidents #1783/#1784 gate)"
  if [ -r /proc/mdstat ] && grep -q '\[[U_]*_[U_]*\]' /proc/mdstat; then
    echo "  RAID: DEGRADED"; grep -E '^md|\[[U_]+\]' /proc/mdstat | sed 's/^/    /'; storage_ok=0
  elif [ -r /proc/mdstat ] && grep -q '^md' /proc/mdstat; then echo "  RAID: all members up"
  else echo "  RAID: no md arrays"; fi
  local ioerr; ioerr="$(dmesg 2>/dev/null | grep -ciE 'I/O error|blk_update_request|medium error|ata[0-9.]+: (failed|exception)|nvme.*(timeout|reset)' || true)"
  echo "  kernel disk errors since boot: $ioerr"; [ "$ioerr" = 0 ] || storage_ok=0
  if command -v smartctl >/dev/null; then
    for d in $(lsblk -dno NAME,TYPE | awk '$2=="disk"{print "/dev/"$1}'); do
      smart_disk "$d"
    done
    if command -v ssacli >/dev/null; then
      echo "  HP Smart Array (ssacli):"; ssacli ctrl all show status 2>/dev/null | grep -iE 'status|slot' | sed 's/^ */    /'
      ssacli ctrl all show config 2>/dev/null | grep -iE 'logicaldrive|physicaldrive' | sed 's/^ */    /'
    fi
  else echo "  SMART: smartctl not installed (apt install smartmontools)"; fi
  local datadir; datadir="$("${MYSQL[@]}" -N -e 'SELECT @@datadir' 2>/dev/null || echo /var/lib/mysql)"
  f="$(newest_backup)"
  say "backup and space"
  if [ -n "$f" ]; then
    local sz; sz=$(stat -c %s "$f")
    echo "  newest backup: $(basename "$f")  $((sz/1048576)) MB  $(( ($(date +%s) - $(stat -c %Y "$f")) / 3600 ))h old"
    local need=$(( sz * 6 / 1024 )) free; free=$(df -Pk "$datadir" | awk 'NR==2{print $4}')
    echo "  MySQL datadir $datadir free: $((free/1024)) MB (need about $((need/1024)) MB)"
    [ "$free" -gt "$need" ] || { echo "  BLOCKER: not enough space for a staging copy"; blockers=$((blockers+1)); }
  else echo "  BLOCKER: no backup in $BACKUP_DIR"; blockers=$((blockers+1)); fi
  echo "  $(dirname "$STG_BASE") free: $(( $(df -Pk "$(dirname "$STG_BASE")" | awk 'NR==2{print $4}') / 1024 )) MB"
  say "web server"
  if command -v nginx >/dev/null; then
    local live; live="$(live_site_file)"
    echo "  nginx: yes   live site file: ${live:-NOT FOUND}"
    echo "  php handler: $(fastcgi_target || echo NOT FOUND)"
    [ -n "$(fastcgi_target || true)" ] || { echo "  BLOCKER: cannot find the live fastcgi_pass"; blockers=$((blockers+1)); }
    local ob; ob="$(grep -rhE '^\s*php_admin_value\[open_basedir\]' /etc/php/*/fpm/pool.d/ 2>/dev/null | head -1 || true)"
    [ -z "$ob" ] || echo "  note: php-fpm pool has open_basedir ($ob); staging path must be inside it"
  else echo "  BLOCKER: nginx not found"; blockers=$((blockers+1)); fi
  echo "  certbot: $(command -v certbot >/dev/null && echo yes || echo 'no (HTTPS step will be skipped)')"
  echo "  DNS $HOST: $(getent ahosts "$HOST" | awk '{print $1}' | sort -u | tr '\n' ' ' || true)"
  [ -n "$(getent ahosts "$HOST" || true)" ] || echo "  note: no DNS yet. Add a record for $HOST pointing where www.mymiwallet.com points, then run: sudo bash $0 vhost"
  say "existing staging"
  echo "  staging DB: $("${MYSQL[@]}" -N -e "SELECT COUNT(*) FROM information_schema.SCHEMATA WHERE SCHEMA_NAME='$STG_DB'" 2>/dev/null | sed 's/1/present/;s/0/absent/')"
  echo "  staging site: $( [ -L "$STG_BASE/current" ] && basename "$(readlink -f "$STG_BASE/current")" || echo absent)"
  [ "$storage_ok" = 1 ] || { echo "BLOCKER: storage is not healthy (see above). Fix #1783/#1784 first, or rerun with STORAGE_OVERRIDE=1 if you have checked it."; [ "${STORAGE_OVERRIDE:-0}" = 1 ] || blockers=$((blockers+1)); }
  if [ "$blockers" -gt 0 ]; then echo "CHECK: $blockers blocker(s)"; return 1; fi
  echo "CHECK: OK"
}
# The live nginx site file. sites-enabled entries are usually symlinks, so use -R.
live_site_file() {
  [ -n "${LIVE_NGINX:-}" ] && { echo "$LIVE_NGINX"; return; }
  local f
  f="$(grep -RlsE "$PROD_BASE(/current)?" /etc/nginx/sites-enabled /etc/nginx/conf.d /etc/nginx/nginx.conf 2>/dev/null | grep -v "$HOST" | head -1 || true)"
  [ -n "$f" ] || f="$(grep -RlsE 'server_name[^;]*(www\.)?mymiwallet\.com' /etc/nginx/sites-enabled /etc/nginx/conf.d /etc/nginx/nginx.conf 2>/dev/null | grep -v "$HOST" | head -1 || true)"
  echo "$f"
}
fastcgi_target() {
  [ -n "${FASTCGI_PASS:-}" ] && { echo "$FASTCGI_PASS"; return; }
  local live t=""; live="$(live_site_file)"
  if [ -n "$live" ]; then
    t="$(grep -hoE 'fastcgi_pass[[:space:]]+[^;]+' "$live" | head -1 | awk '{print $2}' || true)"
    # fastcgi_pass may sit in an included snippet
    [ -n "$t" ] || t="$(grep -hoE 'include[[:space:]]+[^;]+' "$live" | awk '{print $2}' | while read -r inc; do case "$inc" in /*) ;; *) inc="/etc/nginx/$inc";; esac; grep -hoEs 'fastcgi_pass[[:space:]]+[^;]+' $inc; done | head -1 | awk '{print $2}' || true)"
  fi
  [ -n "$t" ] || t="$(ls /run/php/php*-fpm.sock 2>/dev/null | sort -V | tail -1 | sed 's/^/unix:/' || true)"
  [ -n "$t" ] || return 1
  echo "$t"
}

# ---------------------------------------------------------------- env
write_env() {
  local src="$PROD_BASE/shared/.env" dst="$STG_BASE/shared/.env"
  mkdir -p "$STG_BASE/shared"; chown "$OP_USER" "$STG_BASE" "$STG_BASE/shared"
  local dbpw; dbpw="$(cred_get STAGING_DB_PASSWORD)"
  # Older runs made an all-letters-and-digits password that MySQL's policy rejects.
  case "$dbpw" in *-Xz9_*) ;; *) dbpw="$(newdbpw)"; cred_set STAGING_DB_PASSWORD "$dbpw";; esac
  local enc; enc="$(cred_get STAGING_ENCRYPTION_KEY)"; [ -n "$enc" ] || { enc="hex2bin:$(openssl rand -hex 32)"; cred_set STAGING_ENCRYPTION_KEY "$enc"; }
  local dbhost dbport; dbhost="$(envval "$src" database.default.hostname)"; dbport="$(envval "$src" database.default.port)"
  {
    echo "# STAGING-001: generated by scripts/ops/staging/mymi-staging.sh. No live provider keys on purpose."
    echo "# Add SANDBOX keys only (PayPal sandbox, Plaid sandbox). Never paste live keys here."
    echo "CI_ENVIRONMENT = staging"
    # Safe, non-secret app settings copied from live.
    if envval "$src" session.driver | grep -qi database; then grep -E '^[[:space:]]*session\.savePath[[:space:]]*=' "$src" || true; fi
    grep -E "^[[:space:]]*(app\.(CSPEnabled|indexPage|appTimezone|defaultLocale|negotiateLocale|supportedLocales|charset|forceGlobalSecureRequests|cookieSecure)|session\.(driver|expiration|matchIP|timeToUpdate|regenerateDestroy)|security\.(tokenName|headerName|expires|regenerate|redirect|csrfProtection|tokenRandomize)|logger\.threshold|database\.default\.(DBDriver|DBPrefix|charset|DBCollat))[[:space:]]*=" "$src" || true
    echo "app.baseURL = 'https://$HOST/'"
    echo "database.default.hostname = ${dbhost:-localhost}"
    [ -z "$dbport" ] || echo "database.default.port = $dbport"
    echo "database.default.database = $STG_DB"
    echo "database.default.username = $STG_DB_USER"
    echo "database.default.password = '$dbpw'"
    echo "encryption.key = $enc"
    echo "# Separate cookies so staging never touches a live session."
    echo "cookie.prefix = 'stg_'"
    echo "cookie.domain = ''"
    echo "session.cookieName = 'mymi_staging_session'"
    echo "security.cookieName = 'mymi_staging_csrf'"
    echo "# Mail goes nowhere: nothing listens on this port."
    echo "email.protocol = smtp"
    echo "email.SMTPHost = 127.0.0.1"
    echo "email.SMTPPort = 2525"
    echo "email.fromEmail = no-reply@staging.invalid"
    echo "# Money switches: off. Turn one on here only for a sandbox test."
    for f in SOLANA_TRADING AUCTIONS PROJECT_INVESTING MYMIGOLD_PURCHASES MEMBERSHIP_PURCHASES PREDICTIONS; do echo "FEATURE_$f = false"; done
    echo "# Form harness may submit here (never to the live hosts)."
    echo "AIOPS_FORM_TEST_ALLOWED_HOSTS = $HOST"
  } > "$dst.tmp"
  local wr_owner; wr_owner="$(stat -c %U:%G "$PROD_BASE/shared/writable")"
  chown "$OP_USER:${wr_owner#*:}" "$dst.tmp"; chmod 640 "$dst.tmp"; mv "$dst.tmp" "$dst"
  mkdir -p "$STG_BASE/shared/writable"/{cache,logs,session,uploads,debugbar}
  chown -R "$wr_owner" "$STG_BASE/shared/writable"
  echo "wrote $dst ($(grep -c . "$dst") lines, DB password in $CREDS)"
}

# ---------------------------------------------------------------- db
db_refresh() {
  local f; f="$(newest_backup)"; [ -n "$f" ] || die "no backup in $BACKUP_DIR"
  if [ -r "$f.sha256" ]; then (cd "$(dirname "$f")" && sha256sum -c --quiet "$(basename "$f").sha256") || die "backup checksum failed"; fi
  local dbpw; dbpw="$(cred_get STAGING_DB_PASSWORD)"; [ -n "$dbpw" ] || die "no staging DB password yet; run setup"
  local have; have="$("${MYSQL[@]}" -N -e "SELECT COUNT(*) FROM information_schema.TABLES WHERE TABLE_SCHEMA='$STG_DB'")"
  if [ "${REUSE_LOADED:-0}" = 1 ] && [ "$have" -gt 0 ]; then
    say "REUSE_LOADED=1: keeping the $have tables already loaded in $STG_DB (scrub still runs)"
  else
  say "loading $(basename "$f") into $STG_DB"
  "${MYSQL[@]}" -e "DROP DATABASE IF EXISTS \`$STG_DB\`; CREATE DATABASE \`$STG_DB\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
  local start; start=$(date +%s)
  # Strip any database switch and any name-qualified reference to the live DB,
  # so nothing in the dump can land in the live database.
  gzip -cd "$f" | sed -E -e '/^(CREATE DATABASE|USE )/d' -e "s/\`$LIVE_DB\`\.//g" | "${MYSQL[@]}" "$STG_DB"
  echo "loaded in $(( $(date +%s) - start ))s: $("${MYSQL[@]}" -N -e "SELECT COUNT(*) FROM information_schema.TABLES WHERE TABLE_SCHEMA='$STG_DB'") tables"
  fi
  "${MYSQL[@]}" <<SQL
CREATE USER IF NOT EXISTS '$STG_DB_USER'@'localhost' IDENTIFIED BY '$dbpw';
CREATE USER IF NOT EXISTS '$STG_DB_USER'@'127.0.0.1' IDENTIFIED BY '$dbpw';
ALTER USER '$STG_DB_USER'@'localhost' IDENTIFIED BY '$dbpw';
ALTER USER '$STG_DB_USER'@'127.0.0.1' IDENTIFIED BY '$dbpw';
GRANT ALL PRIVILEGES ON \`$STG_DB\`.* TO '$STG_DB_USER'@'localhost';
GRANT ALL PRIVILEGES ON \`$STG_DB\`.* TO '$STG_DB_USER'@'127.0.0.1';
FLUSH PRIVILEGES;
SQL
  scrub
  test_accounts
}

scrub() {
  say "scrubbing personal data and secrets in $STG_DB"
  local strtypes="'char','varchar','tinytext','text','mediumtext','longtext','binary','varbinary','tinyblob','blob','mediumblob','longblob','json'"
  local secret='(^|_)(private_?key|priv_?key|secret|secret_?key|client_?secret|api_?key|api_?secret|access_?token|refresh_?token|auth_?token|remember_?token|token_?hash|hashed_?validator|mnemonic|seed|seed_?phrase|passphrase|password|password_?hash|pass_?hash|reset_?hash|activate_?hash|otp|totp_?secret|secret_?ciphertext|secret_?iv|secret_?tag|backup_?codes(_?hashes)?|ssn|tax_?id|account_?number|routing_?number|card_?number|webhook_?secret|signature)$'
  local pii='(^|_)(phone|phone_?number|mobile|cell|telephone|address|address_?1|address_?2|street|street_?address|zip|zip_?code|postal_?code|dob|date_?of_?birth|birth_?date|ip|ip_?address|user_?agent|first_?name|last_?name|full_?name|middle_?name)$'
  local email='(^|_)e?mail(_?address)?$'
  local sql; sql="$("${MYSQL[@]}" -N -B <<SQL
SELECT CONCAT('UPDATE \`', c.TABLE_NAME, '\` SET \`', c.COLUMN_NAME, '\` = ',
  CASE
    WHEN c.COLUMN_NAME REGEXP '$email' AND c.TABLE_NAME = 'bf_users' THEN CONCAT('CONCAT(''user'', id, ''@staging.invalid'')')
    WHEN c.COLUMN_NAME REGEXP '$email' THEN CONCAT('IF(\`', c.COLUMN_NAME, '\` IS NULL OR \`', c.COLUMN_NAME, '\` = '''', \`', c.COLUMN_NAME, '\`, CONCAT(''scrubbed-'', LEFT(MD5(\`', c.COLUMN_NAME, '\`), 12), ''@staging.invalid''))')
    WHEN c.IS_NULLABLE = 'YES' THEN 'NULL'
    WHEN c.DATA_TYPE = 'json' THEN '''{}'''
    ELSE 'LEFT(MD5(RAND()), 16)'
  END, ';')
FROM information_schema.COLUMNS c JOIN information_schema.TABLES t
  ON t.TABLE_SCHEMA = c.TABLE_SCHEMA AND t.TABLE_NAME = c.TABLE_NAME AND t.TABLE_TYPE = 'BASE TABLE'
WHERE c.TABLE_SCHEMA = '$STG_DB' AND c.DATA_TYPE IN ($strtypes)
  AND (LOWER(c.COLUMN_NAME) REGEXP '$secret' OR LOWER(c.COLUMN_NAME) REGEXP '$pii' OR LOWER(c.COLUMN_NAME) REGEXP '$email');
SQL
)"
  echo "  $(printf '%s\n' "$sql" | grep -c UPDATE || true) columns to scrub"
  { echo "SET SESSION sql_mode = REPLACE(REPLACE(@@sql_mode, 'STRICT_TRANS_TABLES', ''), 'STRICT_ALL_TABLES', ''); SET FOREIGN_KEY_CHECKS = 0;"; printf '%s\n' "$sql"; } | "${MYSQL[@]}" --force "$STG_DB" 2>/tmp/mymi-staging-scrub.err || true
  [ ! -s /tmp/mymi-staging-scrub.err ] || { echo "  scrub warnings: $(wc -l < /tmp/mymi-staging-scrub.err) (see /tmp/mymi-staging-scrub.err)"; }
  # Whole tables that hold sessions, sign-in tokens, logs of sign-ins, mail queues,
  # scraped inbox mail and payment claims.
  local t
  for t in $("${MYSQL[@]}" -N -e "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA='$STG_DB' AND TABLE_TYPE='BASE TABLE' AND (TABLE_NAME REGEXP '(session|auth_tokens|auth_logins|auth_remember|auth_reset_attempts|auth_activation_attempts|auth_token_logins|_2fa|email_queue|mail_queue|temp_email|inbox|payment_claims|ip_history|privacy_requests|login_attempts)')"); do
    "${MYSQL[@]}" "$STG_DB" -e "SET FOREIGN_KEY_CHECKS=0; TRUNCATE TABLE \`$t\`;" && echo "  emptied $t"
  done
  # Every real account gets an unknown random password.
  "${MYSQL[@]}" "$STG_DB" -e "UPDATE bf_users SET password_hash = CONCAT('!staging-disabled-', MD5(RAND()));" 2>/dev/null || true
  echo "  left: $("${MYSQL[@]}" -N "$STG_DB" -e "SELECT COUNT(*) FROM bf_users WHERE email NOT LIKE '%@staging.invalid'" 2>/dev/null || echo '?') accounts with a real-looking email (should be 0)"
}

test_accounts() {
  say "test accounts"
  local cols; cols="$("${MYSQL[@]}" -N -e "SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='$STG_DB' AND TABLE_NAME='bf_users'")"
  [ -n "$cols" ] || { echo "  bf_users missing; skipped"; return; }
  local who
  for who in tester admin; do
    local pw; pw="$(cred_get "STAGING_${who^^}_PASSWORD")"; [ -n "$pw" ] || { pw="$(newpw)"; cred_set "STAGING_${who^^}_PASSWORD" "$pw"; }
    local hash; hash="$(PW="$pw" php -r 'echo password_hash(getenv("PW"), PASSWORD_DEFAULT);')"
    local email="staging-$who@staging.invalid" set="email='staging-$who@staging.invalid', username='staging_$who', password_hash='$hash'" c
    local extra="active:1 deleted:0 force_pass_reset:0 email_verified:1"; [ "$who" = admin ] && extra="$extra role_id:1"
    for c in $extra; do
      printf '%s\n' "$cols" | grep -qx "${c%%:*}" && set="$set, ${c%%:*}=${c#*:}"
    done
    "${MYSQL[@]}" "$STG_DB" <<SQL
SET SESSION sql_mode = REPLACE(REPLACE(@@sql_mode, 'STRICT_TRANS_TABLES', ''), 'STRICT_ALL_TABLES', '');
DELETE FROM bf_users WHERE email = '$email';
INSERT INTO bf_users SET $set;
SQL
    local id; id="$("${MYSQL[@]}" -N "$STG_DB" -e "SELECT id FROM bf_users WHERE email='$email'")"
    if [ "$who" = admin ]; then
      "${MYSQL[@]}" "$STG_DB" -e "INSERT IGNORE INTO auth_groups_users (group_id, user_id) SELECT id, $id FROM auth_groups WHERE name IN ('admin','superadmin');" 2>/dev/null || true
    fi
    echo "  $email (id $id) ready; password in $CREDS"
  done
}

# ---------------------------------------------------------------- deploy
deploy() {
  local ref="${1:-main}"
  [ -f "$STG_BASE/shared/.env" ] || die "no staging .env; run setup"
  as_op git -C "$REPO" fetch --quiet origin "$ref"
  local sha rel r; sha="$(as_op git -C "$REPO" rev-parse FETCH_HEAD)"; rel="$(date -u +%Y%m%dT%H%M%SZ)-${sha:0:8}"; r="$STG_BASE/releases/$rel"
  say "building staging $rel from $ref"
  as_op mkdir -p "$STG_BASE/releases" && as_op mkdir "$r"
  as_op bash -c "git -C '$REPO' archive '$sha' | tar -x -C '$r'"
  rm -rf -- "$r/writable"; ln -sfn "$STG_BASE/shared/writable" "$r/writable"; ln -sfn "$STG_BASE/shared/.env" "$r/.env"
  echo "$sha" > "$r/REVISION"; chown -h "$OP_USER" "$r/writable" "$r/.env" "$r/REVISION"
  (cd "$r" && as_op composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader --no-progress --quiet)
  if [ -n "${MIGRATE:-}" ]; then
    say "staging migrations: $MIGRATE"
    local wr_user; wr_user="$(stat -c %U "$STG_BASE/shared/writable")"
    # shellcheck disable=SC2086
    (cd "$r" && sudo -u "$wr_user" php spark cache:clear && sudo -u "$wr_user" php scripts/ops/db/run-migrations.php $MIGRATE)
  fi
  ln -sfn "releases/$rel" "$STG_BASE/current.next" && mv -T "$STG_BASE/current.next" "$STG_BASE/current"
  systemctl reload "$(systemctl list-units --type=service --no-legend 'php*-fpm*' | awk '{print $1}' | head -1)" || true
  echo "staging is now $rel"
  perms
}

# ---------------------------------------------------------------- vhost
vhost() {
  [ -d /etc/nginx/sites-enabled ] || die "/etc/nginx/sites-enabled not found; nothing changed"
  local fpm; fpm="$(fastcgi_target)" || die "cannot find the live fastcgi_pass; nothing changed"
  local web; web="$(ps -o user= -C nginx | grep -v root | head -1 || echo www-data)"
  local pw; pw="$(cred_get STAGING_SITE_PASSWORD)"; [ -n "$pw" ] || { pw="$(newpw)"; cred_set STAGING_SITE_PASSWORD "$pw"; }
  printf 'staging:%s\n' "$(openssl passwd -apr1 "$pw")" > "$HTPASSWD"; chown "root:$web" "$HTPASSWD"; chmod 640 "$HTPASSWD"
  local live6="#"; grep -rqsE 'listen[[:space:]]+\[::\]' "$(live_site_file)" && live6=""
  if [ ! -f "$NGINX_SITE" ]; then
    cat > "$NGINX_SITE" <<NGX
# STAGING-001: generated by scripts/ops/staging/mymi-staging.sh
server {
    listen 80;
    ${live6}listen [::]:80;
    server_name $HOST;
    root $STG_BASE/current/public;
    index index.php;
    auth_basic "MyMI staging";
    auth_basic_user_file $HTPASSWD;
    add_header X-Robots-Tag "noindex, nofollow" always;
    client_max_body_size 20m;
    location /.well-known/acme-challenge/ { auth_basic off; }
    location / { try_files \$uri \$uri/ /index.php\$is_args\$args; }
    location ~ \.php\$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT \$realpath_root;
        fastcgi_pass $fpm;
    }
    location ~ /\.(?!well-known) { deny all; }
}
NGX
  fi
  ln -sfn "$NGINX_SITE" "/etc/nginx/sites-enabled/$(basename "$NGINX_SITE")"
  if ! nginx -t 2>/tmp/mymi-staging-nginx.txt; then
    rm -f "/etc/nginx/sites-enabled/$(basename "$NGINX_SITE")"; cat /tmp/mymi-staging-nginx.txt
    die "nginx config test failed; staging site disabled again, live site untouched"
  fi
  systemctl reload nginx
  echo "nginx: $HOST enabled (password prompt user 'staging', password in $CREDS)"
  if [ -n "$(getent ahosts "$HOST" || true)" ] && command -v certbot >/dev/null; then
    certbot --nginx -d "$HOST" --non-interactive --redirect --keep-until-expiring || echo "certbot failed; site works on http only for now"
  else
    echo "HTTPS skipped: $( [ -n "$(getent ahosts "$HOST" || true)" ] && echo 'certbot not installed' || echo "no DNS record for $HOST yet")"
  fi
}

# nginx and php-fpm must be able to read the staging files. umask 027 leaves
# them owner-only, so give them the same group the live release uses.
perms() {
  local grp fpm_user
  grp="$(stat -c %G "$(readlink -f "$PROD_BASE/current")")"
  fpm_user="$(ps -eo user=,comm= | awk '$2 ~ /^php-fpm/ && $1 != "root" {print $1; exit}')"; fpm_user="${fpm_user:-www-data}"
  find "$STG_BASE" -path "$STG_BASE/shared/writable" -prune -o -exec chgrp -h "$grp" {} +
  find "$STG_BASE" -path "$STG_BASE/shared/writable" -prune -o -type d -exec chmod g+rxs {} +
  find "$STG_BASE" -path "$STG_BASE/shared/writable" -prune -o -type f -exec chmod g+r {} +
  # writable: php-fpm writes cache, logs and sessions here.
  chown -R "$fpm_user:$grp" "$STG_BASE/shared/writable"
  chmod -R ug+rwX "$STG_BASE/shared/writable"
  find "$STG_BASE/shared/writable" -type d -exec chmod g+s {} +
  sudo -u "$fpm_user" test -w "$STG_BASE/shared/writable/cache" || echo "perms: $fpm_user still cannot write $STG_BASE/shared/writable/cache"
  if sudo -u "$fpm_user" test -r "$STG_BASE/current/public/index.php" && sudo -u "$fpm_user" test -r "$STG_BASE/shared/.env"; then
    echo "perms: $fpm_user can read the staging site (group $grp)"
  else
    echo "perms: $fpm_user still cannot read the staging site:"; namei -l "$STG_BASE/current/public/index.php" | sed 's/^/  /'
  fi
}

# Set a test account's password to one you choose, and save it so db-refresh keeps it.
set_password() {
  local who="${1:-tester}" pw pw2 hash
  case "$who" in tester|admin) ;; *) die "usage: sudo bash $0 set-password tester|admin";; esac
  read -rsp "New staging-$who password: " pw; echo; read -rsp "Again: " pw2; echo
  [ -n "$pw" ] && [ "$pw" = "$pw2" ] || die "passwords empty or different; nothing changed"
  hash="$(PW="$pw" php -r 'echo password_hash(getenv("PW"), PASSWORD_DEFAULT);')"
  "${MYSQL[@]}" "$STG_DB" -e "UPDATE bf_users SET password_hash='$hash' WHERE email='staging-$who@staging.invalid'"
  cred_set "STAGING_${who^^}_PASSWORD" "$pw"
  echo "staging-$who@staging.invalid password set and saved in $CREDS"
}

# Live form test against staging only, signed in as the tester account. The
# harness itself refuses production, refuses hosts not listed below, and skips
# every destructive target (money, mail, deletes, password, admin jobs).
form_test() {
  local limit="${1:-}" fpm_user site_pw tester_pw
  fpm_user="$(stat -c %U "$STG_BASE/shared/writable")"
  site_pw="$(cred_get STAGING_SITE_PASSWORD)"; tester_pw="$(cred_get STAGING_TESTER_PASSWORD)"
  [ -n "$site_pw" ] && [ -n "$tester_pw" ] || die "site or tester password missing from $CREDS; run: sudo bash $0 set-password tester"
  grep -q '^CI_ENVIRONMENT *= *staging' "$STG_BASE/shared/.env" || die "staging .env is not CI_ENVIRONMENT=staging; refusing"
  export AIOPS_FORM_TEST_ALLOWED_HOSTS="$HOST" AIOPS_FORM_TEST_BASIC_AUTH="staging:$site_pw" \
    AIOPS_FORM_TEST_LOGIN="staging-tester@staging.invalid" AIOPS_FORM_TEST_PASSWORD="$tester_pw"
  local args=(--scan-all --submit --allow-destructive --approve); [ -n "$limit" ] && args+=("--limit=$limit")
  say "form test on https://$HOST as staging-tester (revision $(cat "$STG_BASE/current/REVISION" 2>/dev/null || echo '?'))"
  (cd "$STG_BASE/current" && sudo --preserve-env=AIOPS_FORM_TEST_ALLOWED_HOSTS,AIOPS_FORM_TEST_BASIC_AUTH,AIOPS_FORM_TEST_LOGIN,AIOPS_FORM_TEST_PASSWORD \
    -u "$fpm_user" php spark aiops:form:test "${args[@]}")
}

smoke() {
  local pw code; pw="$(cred_get STAGING_SITE_PASSWORD)"
  code="$(curl -s -o /tmp/mymi-staging-smoke.html -w '%{http_code}' -u "staging:$pw" -H "Host: $HOST" -H 'X-Forwarded-Proto: https' "http://127.0.0.1/" || true)"
  grep -qiE 'Fatal error|Uncaught' /tmp/mymi-staging-smoke.html && code="$code+PHP-ERROR"
  echo "smoke: GET / on $HOST via 127.0.0.1 -> $code (200 or 301/302 to https is fine)"
  case "$code" in 2*|30[1278]) ;; *)
    echo "  body: $(head -c 300 /tmp/mymi-staging-smoke.html | tr '\n' ' ')"
    echo "  nginx errors:"; tail -n 5 /var/log/nginx/error.log 2>/dev/null | sed 's/^/    /'
    echo "  app log: $(ls -1t "$STG_BASE/shared/writable/logs"/*.log 2>/dev/null | head -1)"; tail -n 5 "$(ls -1t "$STG_BASE/shared/writable/logs"/*.log 2>/dev/null | head -1)" 2>/dev/null | cut -c1-300 | sed 's/^/    /' ;;
  esac
}

case "$CMD" in
check) check ;;
setup)
  check || die "fix the blockers above first"
  write_env
  db_refresh
  deploy main
  vhost
  smoke
  echo
  echo "STAGING READY: https://$HOST   (site login user 'staging')"
  echo "Test accounts: staging-tester@staging.invalid, staging-admin@staging.invalid"
  echo "All passwords: $CREDS  (view with: cat $CREDS)"
  ;;
db-refresh) check || die "fix the blockers above first"; db_refresh ;;
deploy) deploy "${ARG:-main}"; smoke ;;
perms) perms; smoke ;;
set-password) set_password "${ARG:-tester}" ;;
vhost) vhost; smoke ;;
form-test) form_test "$ARG" ;;
revision) cat "$STG_BASE/current/REVISION" ;;
smart) storage_ok=1; for d in $(lsblk -dno NAME,TYPE | awk '$2=="disk"{print "/dev/"$1}'); do smart_disk "$d"; done; [ "$storage_ok" = 1 ] && echo "SMART: all drives that answered report healthy" || echo "SMART: at least one drive is NOT healthy" ;;
*) sed -n '2,13p' "$0"; exit 1 ;;
esac
