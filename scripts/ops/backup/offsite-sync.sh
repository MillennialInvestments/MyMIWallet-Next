#!/usr/bin/env bash
# Copy MyMI Wallet database backups off gq-ai01 to gq-llm (another machine on
# the GreenQube LAN), so one failed disk cannot take the only copies with it.
# On 2026-11-16 the gq-ai01 disk controller dropped its disk, the root
# filesystem went read-only, and every backup was on that same disk.
#
#   sudo bash offsite-sync.sh            # copy any backups gq-llm does not have yet
#   sudo bash offsite-sync.sh check      # list what gq-llm has (newest 5), copy nothing
#
# Settings come from /etc/mymi-backup-offsite.env (or the environment):
#   OFFSITE_HOST=gq-llm                  host or IP of the backup machine
#   OFFSITE_USER=mymibackup              account there (rrsync, no shell, no delete)
#   OFFSITE_KEY=/root/.ssh/mymi_backup_ed25519
#   BACKUP_DIR=/var/backups/mymiwallet/mysql
#
# Never deletes anything, here or there. Retention on gq-llm is its own job.
set -euo pipefail
umask 077

CONF="${OFFSITE_CONF:-/etc/mymi-backup-offsite.env}"
# shellcheck disable=SC1090
[ -r "$CONF" ] && . "$CONF"
OFFSITE_HOST="${OFFSITE_HOST:-gq-llm}"
OFFSITE_USER="${OFFSITE_USER:-mymibackup}"
OFFSITE_KEY="${OFFSITE_KEY:-/root/.ssh/mymi_backup_ed25519}"
BACKUP_DIR="${BACKUP_DIR:-/var/backups/mymiwallet/mysql}"
STATUS="${OFFSITE_STATUS:-/var/backups/mymiwallet/.offsite-last-ok}"

[ -r "$OFFSITE_KEY" ] || { echo "No SSH key at $OFFSITE_KEY" >&2; exit 1; }
SSH="ssh -i $OFFSITE_KEY -o BatchMode=yes -o ConnectTimeout=15 -o StrictHostKeyChecking=accept-new"
DEST="$OFFSITE_USER@$OFFSITE_HOST:mysql/"

if [ "${1:-}" = check ]; then
  rsync -e "$SSH" --list-only "$DEST" | grep -E '\.sql\.gz' | sort -k3,4 | tail -5
  exit 0
fi

shopt -s nullglob
files=("$BACKUP_DIR"/*.sql.gz "$BACKUP_DIR"/*.sql.gz.age "$BACKUP_DIR"/*.sha256)
[ "${#files[@]}" -gt 0 ] || { echo "No backups in $BACKUP_DIR" >&2; exit 1; }

# --ignore-existing: a file already there is never overwritten (dumps are
# immutable and named by timestamp). Partial uploads go to a temp name.
rsync -e "$SSH" -t --ignore-existing --partial-dir=.partial --chmod=F600 \
  --out-format='  copied %n (%l bytes)' "${files[@]}" "$DEST"

# Confirm the newest local dump is there at the same size.
newest="$(ls -1t "$BACKUP_DIR"/*.sql.gz* 2>/dev/null | grep -v '\.sha256$' | head -1)"
want="$(stat -c %s "$newest")"
got="$(rsync -e "$SSH" --list-only "$DEST$(basename "$newest")" | awk '{gsub(",","",$2); print $2}')"
if [ "$got" = "$want" ]; then
  date -u +%FT%TZ > "$STATUS"
  echo "offsite ok: $(basename "$newest") ($want bytes) on $OFFSITE_HOST"
else
  echo "offsite MISMATCH: $(basename "$newest") local $want, remote ${got:-missing}" >&2
  exit 2
fi
