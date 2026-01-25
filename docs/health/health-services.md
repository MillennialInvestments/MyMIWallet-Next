# `php spark health:services`

## Purpose
Checks PHP-FPM service health, including systemd status and worker visibility.

## What it does
- Runs:
  - `systemctl status php8.2-fpm`
  - `ps aux | grep php-fpm`
- Reports:
  - `php_fpm_running=true|false`
  - `php_fpm_workers=<count>`

## Expected output
```
systemctl status php8.2-fpm
----------------------------------------
...

ps aux | grep php-fpm
----------------------------------------
...

php_fpm_running=true
php_fpm_workers=6
```

## Notes
- This command is **read-only**.
- Use `fix:503` if you need socket checks, cache resets, or structured logging.
