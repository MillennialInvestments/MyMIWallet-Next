#!/usr/bin/env bash
# MYMI-GTM-002 step 1 (run on the prod host BEFORE merging the PR that untracks chat/.env).
# Moves the live chat env out of the release folder into shared/, so a deploy or
# git pull that removes the tracked chat/.env cannot take the chat service down.
#  - copies current/chat/.env to shared/chat.env (same owner/group, mode 640)
#  - points the systemd unit at it with EnvironmentFile= (works for any release)
#  - replaces current/chat/.env with a symlink to the shared file
#  - restarts the chat and checks /health
# Prints no secret values. Safe to re-run.
set -euo pipefail
BASE=/apps/TBI/www/mymiwallet
SRC="$BASE/current/chat/.env"
DEST="$BASE/shared/chat.env"
UNIT=mymi-wallet-chat.service
DROPIN_DIR=/etc/systemd/system/$UNIT.d
DROPIN=$DROPIN_DIR/10-shared-env.conf

sudo -v
if [ -L "$SRC" ] && [ "$(readlink -f "$SRC")" = "$DEST" ]; then
  echo "chat/.env already links to $DEST"
else
  sudo test -f "$SRC" || { echo "No live $SRC found, nothing changed"; exit 1; }
  if sudo test -e "$DEST"; then
    sudo cmp -s "$SRC" "$DEST" || { echo "$DEST exists and differs from the live file, nothing changed"; exit 1; }
  else
    OWN="$(sudo stat -c %U:%G "$SRC")"
    sudo install -m 640 -o "${OWN%%:*}" -g "${OWN##*:}" "$SRC" "$DEST"
  fi
  sudo cmp -s "$SRC" "$DEST" || { echo "Copy check failed, nothing else changed"; exit 1; }
  echo "copied live env to $DEST ($(sudo stat -c '%U:%G %a' "$DEST"))"
fi

sudo mkdir -p "$DROPIN_DIR"
printf '[Service]\nEnvironmentFile=%s\n' "$DEST" | sudo tee "$DROPIN" >/dev/null
echo "systemd drop-in written: $DROPIN"

if ! [ -L "$SRC" ]; then
  sudo ln -sfn "$DEST" "$SRC"
  echo "replaced $SRC with a symlink to $DEST"
fi

sudo systemctl daemon-reload
sudo systemctl restart "$UNIT"
sleep 3
systemctl is-active "$UNIT"
systemctl show -p EnvironmentFiles "$UNIT"
echo -n "health: "; curl -fsS http://127.0.0.1:8300/health || echo "FAILED"
echo
echo "Done. Now it is safe to merge the PR that untracks chat/.env."
