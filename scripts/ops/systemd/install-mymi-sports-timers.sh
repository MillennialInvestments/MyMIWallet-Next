#!/usr/bin/env bash
# Installs the MyMI Sports data timers from the live release.
#
#   sudo bash scripts/ops/systemd/install-mymi-sports-timers.sh            # preview only, changes nothing
#   sudo bash scripts/ops/systemd/install-mymi-sports-timers.sh --apply    # install + enable both
#   sudo bash scripts/ops/systemd/install-mymi-sports-timers.sh --remove   # disable + remove both
#
# mymi-sports-stats  daily 08:30 Chicago   php spark sports:import --provider nflverse   (free, one download)
# mymi-sports-lines  Tue+Sat 10:00 Chicago php spark sports:lines (Odds API, ~3 credits/game, keeps 120 in reserve)
#
# Both run as www-data in /apps/TBI/www/mymiwallet/current and only write bf_sports_* tables
# and writable/cache/nflverse/. Logs: journalctl -u mymi-sports-stats -u mymi-sports-lines
set -u
BASE="${BASE:-/apps/TBI/www/mymiwallet}"
SRC="$BASE/current/scripts/ops/systemd"
DST="${DST:-/etc/systemd/system}"
BACKUP_ROOT="${BACKUP_ROOT:-/apps/TBI/backups/mymi-sports-timers}"
TIMERS="mymi-sports-stats mymi-sports-lines"
APPLY=0; REMOVE=0
for a in "$@"; do
  case "$a" in
    --apply) APPLY=1 ;;
    --remove) REMOVE=1 ;;
    *) echo "unknown option: $a"; exit 64 ;;
  esac
done

say()  { printf '%s\n' "$*"; }
stop() { say "STOP: $*"; say "SEMANTIC_RESULT=BLOCKED_SAFETY"; exit 2; }

[ -f "$BASE/current/app/Commands/Sports/SportsLines.php" ] || stop "the live release has no sports commands; deploy first"

if [ "$REMOVE" -eq 1 ]; then
  [ "$(id -u)" -eq 0 ] || stop "run with sudo"
  dir="$BACKUP_ROOT/remove-$(date -u +%Y%m%dT%H%M%SZ)"; mkdir -p "$dir" && chmod 700 "$dir" || stop "cannot create $dir"
  for t in $TIMERS; do
    systemctl disable --now "$t.timer" >/dev/null 2>&1
    for ext in service timer; do
      [ -f "$DST/$t.$ext" ] && cp -a "$DST/$t.$ext" "$dir/" && rm -f "$DST/$t.$ext"
    done
  done
  systemctl daemon-reload
  say "PASS MyMI sports timers removed (copies in $dir)"
  say "SEMANTIC_RESULT=PASS"
  exit 0
fi

for t in $TIMERS; do
  for ext in service timer; do
    [ -f "$SRC/$t.$ext" ] || stop "missing $SRC/$t.$ext"
    if [ -f "$DST/$t.$ext" ] && cmp -s "$SRC/$t.$ext" "$DST/$t.$ext"; then say "  same     $t.$ext"
    elif [ -f "$DST/$t.$ext" ]; then say "  changed  $t.$ext"
    else say "  new      $t.$ext"; fi
  done
  if command -v systemd-analyze >/dev/null 2>&1; then
    cal="$(sed -n 's/^OnCalendar=//p' "$SRC/$t.timer")"
    systemd-analyze calendar "$cal" >/dev/null 2>&1 || stop "systemd cannot read the schedule in $t.timer: $cal"
  fi
done

if [ "$APPLY" -ne 1 ]; then
  say "Preview only; nothing changed. Add --apply to install."
  say "SEMANTIC_RESULT=EXPECTED_GATE"
  exit 0
fi

[ "$(id -u)" -eq 0 ] || stop "run with sudo"
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
say "SEMANTIC_RESULT=PASS"
