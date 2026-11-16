#!/usr/bin/env bash
# MyMI Wallet release builder for gq-ai01. Builds a new immutable folder under
# releases/, then (separately) migrates and switches `current` to it.
#
#   bash mymi-release.sh build [git-ref]     # build releases/<stamp>-<sha7>; live site untouched
#   MIGRATE='<name> ...' bash mymi-release.sh activate <release>
#                                            # backup, run only the named migrations, switch current, restart, health check
#   bash mymi-release.sh rollback <release>  # point current back at an older release (no DB changes)
#
# Staging first: activate refuses a release whose commit is not what staging
# (https://staging.mymiwallet.com) is running. Put it on staging with
#   sudo bash mymi-staging.sh deploy <sha>
# and check it there. SKIP_STAGING=1 skips the check (say why in the release notes).
#
# Never prints secrets. Never deletes old releases.
set -euo pipefail
umask 027

BASE="${BASE:-/apps/TBI/www/mymiwallet}"
REPO="${REPO:-/apps/TBI/repos/mymiwallet-next}"
REMOTE="${REMOTE:-origin}"
SITE_URL="${SITE_URL:-https://www.mymiwallet.com/}"
CHAT_HEALTH="${CHAT_HEALTH:-http://127.0.0.1:8300/health}"
STAGING_BASE="${STAGING_BASE:-/apps/TBI/www/mymiwallet-staging}"
CMD="${1:-}"; ARG="${2:-}"

die() { echo "ERROR: $*" >&2; exit 1; }
current_target() { readlink -f "$BASE/current"; }
# Each release is a full copy of the app (~0.5 GB). On 2026-11-16 old
# releases filled the disk and took the site down, so keep only the newest
# KEEP_RELEASES (default 4) plus whatever current and the rollback target are.
KEEP_RELEASES="${KEEP_RELEASES:-4}"
MIN_FREE_GB="${MIN_FREE_GB:-3}"
free_gb() { df -P --block-size=1G "$1" | awk 'NR==2 {print $4}'; }
need_space() {
  local f; f="$(free_gb "$BASE")"
  [ "${f:-0}" -ge "$MIN_FREE_GB" ] || die "only ${f}G free on $(df -P "$BASE" | awk 'NR==2 {print $6}'); need ${MIN_FREE_GB}G. Free space first (old releases: bash $0 prune)."
}
prune_releases() {
  local keep="$1"; shift
  local n=0 d name
  for d in $(ls -1d "$BASE"/releases/*/ 2>/dev/null | sort -r); do
    name="$(basename "$d")"; n=$((n + 1))
    case " $* " in *" $name "*) continue ;; esac
    [ "$n" -le "$keep" ] && continue
    sudo rm -rf -- "$BASE/releases/$name" && echo "  pruned $name"
  done
}
staging_revision() { cat "$STAGING_BASE/current/REVISION" 2>/dev/null || sudo cat "$STAGING_BASE/current/REVISION" 2>/dev/null || true; }
staging_gate() { # staging_gate <sha>
  [ "${SKIP_STAGING:-}" = 1 ] && { echo "Staging check skipped (SKIP_STAGING=1)."; return 0; }
  [ -d "$STAGING_BASE" ] || { echo "No staging site at $STAGING_BASE; staging check skipped."; return 0; }
  local stg; stg="$(staging_revision)"
  if [ "$stg" = "$1" ]; then
    echo "Staging is running this commit (${1:0:8}). OK."
  else
    die "staging runs ${stg:-nothing} but this release is $1. Put it on staging first: sudo bash ~/mymi-staging.sh deploy $1  (then re-run this; SKIP_STAGING=1 to override)"
  fi
}
# Spark commands run in a release that is not live yet get their own writable
# dir. The shared one holds CodeIgniter's file locator cache, and filling it
# from a candidate release would make the live site load the candidate's files.
private_writable() {
  mkdir -p "$1/.writable-cli"/{cache,logs,session,uploads,debugbar}
  ln -sfn "$1/.writable-cli" "$1/writable"
}
shared_writable() { ln -sfn "$BASE/shared/writable" "$1/writable"; }
switch_to() { # atomic symlink swap
  local rel="$1"
  shared_writable "$BASE/releases/$rel"
  ln -sfn "releases/$rel" "$BASE/current.next"
  mv -T "$BASE/current.next" "$BASE/current"
  # CI4's file-locator cache in shared/writable/cache stores absolute paths
  # into the release that wrote it; after a switch (or once that release is
  # pruned) they break spark and web requests. Drop it on every switch.
  sudo find "$BASE/shared/writable/cache" -mindepth 1 -maxdepth 1 ! -name index.html ! -name .htaccess -exec rm -rf -- {} + 2>/dev/null || true
}
health() {
  local site chat body
  body="$(mktemp)"
  site="$(curl -s -o "$body" -w '%{http_code}' "$SITE_URL" || true)"
  # PHP can print a fatal error with status 200, so check the page body too.
  if grep -qiE 'Fatal error|Uncaught Error|Failed to open stream' "$body"; then site="$site+PHP-ERROR"; fi
  rm -f "$body"
  chat="$(curl -fsS "$CHAT_HEALTH" 2>/dev/null || echo FAILED)"
  echo "site: $site   chat: $chat"
  [ "$site" = "200" ] && [ "$chat" != "FAILED" ]
}
restart() {
  sudo systemctl reload php8.2-fpm
  sudo systemctl restart mymi-wallet-chat.service
  sleep 5
}

case "$CMD" in
build)
  REF="${ARG:-main}"
  [ -d "$REPO/.git" ] || die "No git checkout at $REPO"
  git -C "$REPO" fetch --quiet "$REMOTE" "$REF"
  SHA="$(git -C "$REPO" rev-parse FETCH_HEAD)"
  REL="$(date -u +%Y%m%dT%H%M%SZ)-gtm-${SHA:0:8}"
  R="$BASE/releases/$REL"
  CUR="$(current_target)"
  [ ! -e "$R" ] || die "$R already exists"
  need_space
  echo "Building $REL from $REF ($SHA); current is $(basename "$CUR")"

  mkdir -p "$R"
  git -C "$REPO" archive "$SHA" | tar -x -C "$R"
  # writable and .env are shared across releases.
  [ -d "$R/writable" ] && rm -rf -- "$R/writable"
  private_writable "$R"
  ln -s "$BASE/shared/.env" "$R/.env"
  echo "$SHA" > "$R/REVISION"

  echo "--- composer install (no dev) ---"
  (cd "$R" && composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader --no-progress)

  echo "--- node modules ---"
  for d in . chat; do
    [ -f "$R/$d/package.json" ] || continue
    if [ -d "$CUR/$d/node_modules" ] && cmp -s "$CUR/$d/package-lock.json" "$R/$d/package-lock.json" 2>/dev/null; then
      cp -a "$CUR/$d/node_modules" "$R/$d/node_modules" && echo "  $d: copied from current (lockfile unchanged)"
    elif [ -f "$R/$d/package-lock.json" ]; then
      (cd "$R/$d" && npm ci --omit=dev --no-audit --no-fund) && echo "  $d: npm ci"
    elif [ -d "$CUR/$d/node_modules" ]; then
      cp -a "$CUR/$d/node_modules" "$R/$d/node_modules" && echo "  $d: copied from current (no lockfile)"
    fi
  done

  # php-fpm runs as www-data and must be able to read every file.
  chgrp -R www-data "$R" 2>/dev/null || sudo chgrp -R www-data "$R"
  chmod -R g+rX,o-rwx "$R" 2>/dev/null || sudo chmod -R g+rX,o-rwx "$R"
  sudo -u www-data test -r "$R/vendor/autoload.php" && sudo -u www-data test -r "$R/public/index.php" \
    || die "www-data cannot read the new release; fix permissions before activating"

  echo "--- checks ---"
  (cd "$R" && php -l app/Config/Routes.php >/dev/null && { php spark list >/dev/null 2>&1 || php spark list >/dev/null; }) || die "spark failed to boot in the new release"
  echo "Pending App migrations (activate runs only the ones you name in MIGRATE):"
  (cd "$R" && php spark migrate:status 2>/dev/null | grep -E '^\| App ' | grep -E '\| ---' || echo "  none")
  shared_writable "$R"
  echo
  echo "Built. Nothing live changed."
  if [ "$(staging_revision)" != "$SHA" ] && [ -d "$STAGING_BASE" ]; then
    echo "Next 1, staging: sudo bash ~/mymi-staging.sh deploy $SHA && sudo bash ~/mymi-staging.sh form-test"
  fi
  echo "Next 2, live:    MIGRATE='<names>' bash $0 activate $REL"
  ;;

prune)
  CUR="$(basename "$(current_target)")"
  echo "Pruning releases: keep newest $KEEP_RELEASES plus current ($CUR)"
  prune_releases "$KEEP_RELEASES" "$CUR"
  df -h "$BASE" | tail -1
  ;;

activate)
  REL="$ARG"; [ -n "$REL" ] || die "usage: activate <release>"
  R="$BASE/releases/$REL"; [ -d "$R" ] && [ -f "$R/REVISION" ] || die "$R is not a built release"
  PREV="$(basename "$(current_target)")"
  [ "$PREV" != "$REL" ] || die "$REL is already current"
  [ -z "$(sudo find "$R" -path "$R/node_modules" -prune -o -path "$R/chat/node_modules" -prune -o -path "$R/.writable-cli" -prune -o ! -type l ! -group www-data -print -quit)" ] \
    && sudo -u www-data test -r "$R/vendor/autoload.php" \
    || die "$R is not fully readable by www-data (run: sudo chgrp -R www-data $R && sudo chmod -R g+rX $R)"
  staging_gate "$(cat "$R/REVISION")"
  echo "Activating $REL (previous: $PREV)"

  echo "--- backup ---"
  sudo bash "$R/scripts/ops/backup/mysql-backup.sh"

  echo "--- migrate (only the migrations named in MIGRATE) ---"
  # `spark migrate` would run every pending App migration, and production has
  # older ones (auth backfills) that must not run unreviewed. So run only the
  # ones named in MIGRATE, then list whatever is still pending.
  private_writable "$R"
  for m in ${MIGRATE:-}; do
    (cd "$R" && php scripts/ops/db/run-migrations.php "$m") || die "migration $m failed; nothing was switched"
  done
  echo "App migrations still pending (not run):"
  (cd "$R" && php spark migrate:status 2>/dev/null | grep -E '^\| App ' | grep -E '\| ---' | awk -F'|' '{print "  " $3 $4}' || true)
  shared_writable "$R"

  echo "--- switch ---"
  switch_to "$REL"
  (cd "$BASE/current" && php spark cache:clear >/dev/null 2>&1 || true)
  restart
  if health; then
    echo "OK: $REL is live. Roll back with: bash $0 rollback $PREV"
    echo "--- prune (keep newest $KEEP_RELEASES, plus $REL and $PREV) ---"
    prune_releases "$KEEP_RELEASES" "$REL" "$PREV"
  else
    echo "Health check FAILED. Rolling the code back to $PREV (database migrations stay applied)."
    switch_to "$PREV"; restart; health || true
    exit 2
  fi
  ;;

rollback)
  REL="$ARG"; [ -n "$REL" ] && [ -d "$BASE/releases/$REL" ] || die "usage: rollback <existing release>"
  switch_to "$REL"; restart; health
  ;;

*)
  sed -n '2,14p' "$0"; exit 1 ;;
esac
