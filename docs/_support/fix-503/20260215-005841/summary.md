# 503 Forensic Report

## Root Cause + Next Steps

- **Root Cause:** CI4 bootstrap failure
- **Risk Level:** MEDIUM

## Hosting Mode Detection

- **Hosting Mode:** NGINX+PHP-CGI
- **Web Server:** nginx
- **PHP Mode:** cgi
- **PHP Workers:** 1
- **FastCGI Upstream:** unix:/home/mymiteam/.php/php-fpm.sock
- **Ports Listening:** 80, 443

## PHP Handler Presence

- **PHP Backend Healthy:** yes
- **Sockets:** /dh/cgi-system/php74.cgi, /home/mymiteam/.local/phpcgi/run/php-cgi-82.sock, /home/mymiteam/.php.sock, /home/mymiteam/.php/php-fpm.sock, /run/php/php8.1-fpm.sock, 127.0.0.1:9071

## CI4 Boot Status

- **.env exists:** yes
- **public/index.php exists:** yes
- **vendor/autoload.php exists:** yes
- **php spark env:** fail
- **php spark routes:** fail
- **CI4 boot status:** fail

## Actions

### Taken
- Cleared CI4 cache

### Not Taken
- Web server restart (manual required)

## Manual Restart Commands
- systemctl restart php-fpm (or php8.2-fpm)
- service php-fpm restart
- DreamHost panel: Websites > Manage Domains > Toggle PHP version to restart php-cgi
- nginx -t && nginx -s reload (user-space nginx)

## Recommendations
- Review PHP handler configuration in your DreamHost panel.
- Add watchdogs/alerts to detect backend worker failures.
- Manual restart: systemctl restart php-fpm (or php8.2-fpm)
- Manual restart: service php-fpm restart
- Manual restart: DreamHost panel: Websites > Manage Domains > Toggle PHP version to restart php-cgi
- Manual restart: nginx -t && nginx -s reload (user-space nginx)
- Confidence score: 75%
- EnvDoctor summary: status=warning score=70
- EnvDoctor JSON: /home/mymiteam/mymiwallet/site/current/writable/triage/envdoctor/envdoctor-2026-02-15-005841.json
- EnvDoctor Markdown: /home/mymiteam/mymiwallet/site/current/writable/triage/envdoctor/envdoctor-2026-02-15-005841.md

## Sanitized Env Snapshot
- /home/mymiteam/mymiwallet/site/current/docs/_support/fix-503/20260215-005841/env-summary.txt

## App Log Tail (last 50 lines)
```
[2026-02-15T00:56:36+00:00][HEALTHCHECK] LOG_HEALTHCHECK fallback probe marker=cce1a3be4d64
[2026-02-15T00:57:58+00:00][HEALTHCHECK] LOG_HEALTHCHECK fallback probe marker=fc8f767f46d0
[2026-02-15T00:58:05+00:00][HEALTHCHECK] LOG_HEALTHCHECK fallback probe marker=352a87c0609c
```
