#!/usr/bin/env bash
# Installs the MyMI Wallet ops job timers from the live release.
#
#   sudo bash scripts/ops/systemd/install-mymi-ops-timers.sh                 # preview only, changes nothing
#   sudo bash scripts/ops/systemd/install-mymi-ops-timers.sh --apply         # install + enable daily and nightly
#   sudo bash scripts/ops/systemd/install-mymi-ops-timers.sh --apply --with-db-maintenance
#                                                                             # also the weekly ops-table cleanup
#   sudo bash scripts/ops/systemd/install-mymi-ops-timers.sh --remove        # disable + remove all three
#
# mymi-ops-daily   07:00 Chicago  ops.health.check, ops.logs.triage_daily
# mymi-ops-nightly 02:00 Chicago  ops.routes.smoke_test, ops.security.headers_scan
# mymi-ops-db-weekly Sun 03:00    ops.db.maintenance (deletes ops queue rows older than 14 days and
#                                 run rows older than 60 days, optimizes those two tables). Opt-in.
#
# Each job runs `php spark ops:job:run <job>` as www-data in /apps/TBI/www/mymiwallet/current
# and records its result in writable/ops/last-run/, which GET /API/Ops/watch-status reports.
set -u
BASE="${BASE:-/apps/TBI/www/mymiwallet}"
SRC="$BASE/current/scripts/ops/systemd"
DST="${DST:-/etc/systemd/system}"
BACKUP_ROOT="${BACKUP_ROOT:-/apps/TBI/backups/mymi-ops-timers}"
APPLY=0; REMOVE=0; WITH_DB=0
for a in "$@"; do
  case "$a" in
    --apply) APPLY=1 ;;
    --remove) REMOVE=1 ;;
    --with-db-maintenance) WITH_DB=1 ;;
    *) echo "unknown option: $a"; exit 64 ;;
  esac
done

say()  { printf '%s\n' "$*"; }
stop() { say "STOP: $*"; say "SEMANTIC_RESULT=BLOCKED_SAFETY"; exit 2; }

TIMERS="mymi-ops-daily mymi-ops-nightly"
[ "$WITH_DB" -eq 1 ] && TIMERS="$TIMERS mymi-ops-db-weekly"
ALL="mymi-ops-daily mymi-ops-nightly mymi-ops-db-weekly"

[ -d "$SRC" ] || stop "$SRC not found: deploy the MyMI release that adds the ops timers first"
[ -f "$BASE/current/app/Commands/Ops/JobRun.php" ] || stop "the live release has no ops:job:run command; deploy first"

if [ "$REMOVE" -eq 1 ]; then
  [ "$(id -u)" -eq 0 ] || stop "run with sudo"
  dir="$BACKUP_ROOT/remove-$(date -u +%Y%m%dT%H%M%SZ)"; mkdir -p "$dir" && chmod 700 "$dir" || stop "cannot create $dir"
  for t in $ALL; do
    systemctl disable --now "$t.timer" >/dev/null 2>&1
    for ext in service timer; do
      [ -f "$DST/$t.$ext" ] && cp -a "$DST/$t.$ext" "$dir/" && rm -f "$DST/$t.$ext"
    done
  done
  systemctl daemon-reload
  say "PASS MyMI ops timers removed (copies in $dir)"
  say "SEMANTIC_RESULT=PASS"
  exit 0
fi

say "Timers to install: $TIMERS"
for t in $TIMERS; do
  for ext in service timer; do
    [ -f "$SRC/$t.$ext" ] || stop "missing $SRC/$t.$ext"
    if [ -f "$DST/$t.$ext" ] && cmp -s "$SRC/$t.$ext" "$DST/$t.$ext"; then
      say "  same     $t.$ext"
    elif [ -f "$DST/$t.$ext" ]; then
      say "  changed  $t.$ext"
    else
      say "  new      $t.$ext"
    fi
  done
  if command -v systemd-analyze >/dev/null 2>&1; then
    cal="$(sed -n 's/^OnCalendar=//p' "$SRC/$t.timer")"
    systemd-analyze calendar "$cal" >/dev/null 2>&1 || stop "systemd cannot read the schedule in $t.timer: $cal"
  fi
done
[ "$WITH_DB" -eq 1 ] || say "  (mymi-ops-db-weekly is opt-in: add --with-db-maintenance)"

if [ "$APPLY" -ne 1 ]; then
  say "Preview only; nothing changed. Add --apply to install."
  say "SEMANTIC_RESULT=EXPECTED_GATE"
  exit 0
fi

[ "$(id -u)" -eq 0 ] || stop "run with sudo"
id www-data >/dev/null 2>&1 || stop "user www-data not found"
sudo -u www-data test -w "$BASE/shared/writable" || stop "www-data cannot write $BASE/shared/writable"
dir="$BACKUP_ROOT/$(date -u +%Y%m%dT%H%M%SZ)"; mkdir -p "$dir" && chmod 700 "$dir" || stop "cannot create $dir"
for t in $TIMERS; do
  for ext in service timer; do
    if [ -f "$DST/$t.$ext" ]; then cp -a "$DST/$t.$ext" "$dir/" || stop "could not back up $DST/$t.$ext"; fi
    install -m 0644 "$SRC/$t.$ext" "$DST/$t.$ext" || stop "could not install $t.$ext; backups in $dir"
  done
done
systemctl daemon-reload || stop "systemctl daemon-reload failed; backups in $dir"
for t in $TIMERS; do
  systemctl enable --now "$t.timer" >/dev/null 2>&1 || stop "could not enable $t.timer; backups in $dir"
  say "PASS $t.timer enabled (next: $(systemctl show "$t.timer" -p NextElapseUSecRealtime --value 2>/dev/null))"
done
say "BACKUP_DIR=$dir"
say "ROLLBACK: sudo bash $0 --remove"
say "Run one job now to check it: sudo -u www-data bash -c 'cd $BASE/current && php spark ops:job:run ops.health.check'"
say "SEMANTIC_RESULT=PASS"
