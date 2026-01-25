# Server Bootstrap Checklist (DreamHost User-Space)

## Account & Shell
- [ ] Confirm `$HOME` is set and writable.
- [ ] Ensure `~/.bashrc` exists and does **not** start daemons.
- [ ] Source `~/.mymi-tools.sh` from `~/.bashrc`.

## CRON
- [ ] `crontab -l` works and includes required jobs.
- [ ] Add an `@reboot` supervisor entry for user-space services.

## Supervisor (User-Space)
- [ ] Place supervisor config at `~/.config/supervisor/supervisord.conf` (or approved user-space path).
- [ ] Confirm supervisord is running **or** explicitly set `autostart=false` when intentionally stopped.

## PHP Runtime
- [ ] Verify `php -v` for CLI version.
- [ ] Confirm PHP-FPM or php-cgi socket files exist and match web server config.
- [ ] Ensure there is **one** active socket per site to avoid conflicts.

## Web Server (Nginx / Apache)
- [ ] Detect active server process (`nginx` or `apache/httpd`).
- [ ] Validate user-space nginx config path (e.g., `~/nginx/conf/nginx.conf`).
- [ ] Verify PHP handler (`fastcgi_pass` / `proxy_pass` for nginx, `SetHandler` / `ProxyPassMatch` for Apache).

## CodeIgniter 4
- [ ] `public/index.php` exists.
- [ ] `writable/` is writable by the app user.
- [ ] Maintenance flag is off unless explicitly enabled.
- [ ] Review latest application logs for errors.

## System
- [ ] Disk space > 10% free.
- [ ] Memory availability > 20%.
- [ ] Listening ports and running php/nginx/apache processes look normal.

## Safety
- [ ] No sudo.
- [ ] No service restarts.
- [ ] Read-only inspections only.
