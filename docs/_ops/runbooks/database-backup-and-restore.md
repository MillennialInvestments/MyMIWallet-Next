# Database backup and restore (GTM-060)

Scripts are in `scripts/ops/backup/`. They read DB settings from
`/apps/TBI/www/mymiwallet/shared/.env` and never print them.

## One-time setup on the server

```bash
cd /apps/TBI/www/mymiwallet/current
sudo mkdir -p /var/backups/mymiwallet/mysql && sudo chmod 700 /var/backups/mymiwallet/mysql
sudo bash scripts/ops/backup/mysql-backup.sh          # first backup, prints "backup ok: ..."
sudo bash scripts/ops/backup/mysql-restore-check.sh   # prints "RESTORE CHECK PASSED"
sudo cp scripts/ops/backup/systemd/mymi-db-*.{service,timer} /etc/systemd/system/
sudo systemctl daemon-reload
sudo systemctl enable --now mymi-db-backup.timer mymi-db-restore-check.timer
systemctl list-timers 'mymi-db-*'
```

Offsite copies (recommended): install `age` and `rclone`, then set
`BACKUP_AGE_RECIPIENT` and `BACKUP_RCLONE_REMOTE` in a drop-in such as
`/etc/systemd/system/mymi-db-backup.service.d/offsite.conf`:

```ini
[Service]
Environment=BACKUP_AGE_RECIPIENT=age1...
Environment=BACKUP_RCLONE_REMOTE=offsite:mymi-backups
```

Keep the age private key off the server, in the password manager.

## Schedule

| Job | When (UTC) | Keeps |
|---|---|---|
| `mymi-db-backup.timer` | daily 08:15 | 14 days locally (`BACKUP_KEEP_DAYS`) |
| `mymi-db-restore-check.timer` | Sundays 09:30 | restores into `mymi_restore_check`, then drops it |

Check results with `journalctl -u mymi-db-backup -u mymi-db-restore-check --since -8d`.

## Recovery targets

- RPO (data loss): up to 24 hours with nightly dumps. Turn on MySQL binlogs
  if that is too much.
- RTO (time to restore): the restore check prints how long a full restore took.
  Record it here after the first run.

## Restoring for real (needs owner approval)

1. Stop writes: `sudo systemctl stop php8.2-fpm mymi-wallet-chat`.
2. Take a fresh backup of the current state first, even if it's damaged.
3. Restore into a new database, check it, then point `shared/.env` at it, or
   restore over the live database:
   `gzip -cd <file>.sql.gz | sudo mysql <live_db>` (decrypt `.age` first with `age -d`).
4. Start services and run `/system/healthz` and a login smoke test.
