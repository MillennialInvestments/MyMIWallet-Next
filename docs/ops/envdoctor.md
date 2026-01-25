# EnvDoctor (DreamHost-aware)

## Overview
EnvDoctor performs DreamHost-focused environment checks and writes both JSON and Markdown snapshots to `writable/triage/envdoctor/`. It is safe to run in production because it only reads state and writes to `writable/`.

## Run
```bash
php spark env:doctor
```

### Discord notification
```bash
php spark env:doctor --notify=discord
```

### Optional pack
```bash
php spark env:doctor --pack
```

## Output
Reports are stored with timestamped filenames:
- `writable/triage/envdoctor/envdoctor-YYYY-mm-dd-His.json`
- `writable/triage/envdoctor/envdoctor-YYYY-mm-dd-His.md`

## Key checks
- `~/.bashrc` exists and sources `~/.mymi-tools.sh`.
- `crontab -l` has an `@reboot` supervisor start (or DreamHost panel note).
- Supervisor config exists under `~/supervisor` and `supervisord` is running.
- Home nginx config test: `~/nginx/sbin/nginx -t -p ~/nginx -c conf/nginx.conf`.
- PHP backend detected (php82.cgi/php-cgi/supervisord process or socket).
- CI4 `writable/` permissions and cache/session/debugbar dirs are writable.

## Nightly cron example
```bash
0 2 * * * /usr/bin/php /home/mymiteam/mymiwallet/site/current/spark env:doctor --notify=discord
```

## Notes
- EnvDoctor intentionally avoids `systemctl` because DreamHost uses user-space daemons.
- The JSON summary returned by `/ops/health` is derived from the latest EnvDoctor report.
