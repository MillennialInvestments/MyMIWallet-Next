#!/usr/bin/env bash
# MyMI Wallet release builder for gq-ai01. Builds a new immutable folder under
# releases/, then (separately) migrates and switches `current` to it.
#
#   bash mymi-release.sh build [git-ref]     # build releases/<stamp>-<sha7>; live site untouched
#   MIGRATE='<name> ...' bash mymi-release.sh activate <release>
#                                            # backup, run only the named migrations, switch current, restart, health check
#   bash mymi-release.sh rollback <release>  # point current back at an older release (no DB changes)
#
# Never prints secrets. Never deletes old releases.
set -euo pipefail
umask 027

BASE="${BASE:-/apps/TBI/www/mymiwallet}"
REPO="${REPO:-/apps/TBI/repos/mymiwallet-next}"
REMOTE="${REMOTE:-origin}"
SITE_URL="${SITE_URL:-https://www.mymiwallet.com/}"
CHAT_HEALTH="${CHAT_HEALTH:-http://127.0.0.1:8300/health}"
CMD="${1:-}"; ARG="${2:-}"

die() { echo "ERROR: $*" >&2; exit 1; }
current_target() { readlink -f "$BASE/current"; }
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
}
health() {
  local site chat
  site="$(curl -s -o /dev/null -w '%{http_code}' "$SITE_URL" || true)"
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

  chgrp -R www-data "$R" 2>/dev/null || true
  chmod -R g+rX,o-rwx "$R"

  echo "--- checks ---"
  (cd "$R" && php -l app/Config/Routes.php >/dev/null && { php spark list >/dev/null 2>&1 || php spark list >/dev/null; }) || die "spark failed to boot in the new release"
  echo "Pending App migrations (activate runs only the ones you name in MIGRATE):"
  (cd "$R" && php spark migrate:status 2>/dev/null | grep -E '^\| App ' | grep -E '\| ---' || echo "  none")
  shared_writable "$R"
  echo
  echo "Built. Nothing live changed. Next: MIGRATE='<names>' bash $0 activate $REL"
  ;;

activate)
  REL="$ARG"; [ -n "$REL" ] || die "usage: activate <release>"
  R="$BASE/releases/$REL"; [ -d "$R" ] && [ -f "$R/REVISION" ] || die "$R is not a built release"
  PREV="$(basename "$(current_target)")"
  [ "$PREV" != "$REL" ] || die "$REL is already current"
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
  sed -n '2,9p' "$0"; exit 1 ;;
esac
