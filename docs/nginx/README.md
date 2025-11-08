# MyMI Wallet Nginx Overview

This document captures the layout that DreamHost's user-space Nginx uses for the MyMI Wallet deployment. The goal is to make it
straightforward to audit the configs when troubleshooting pretty URLs, PHP-FPM connectivity, or CDN/proxy-related issues.

## Process tree

```text
~mymiteam/nginx/
├── conf/
│   ├── mime.types
│   └── nginx.conf        # entry point for user-space Nginx (mirrored as .nginx.conf in this repo)
├── fastcgi_params        # included by PHP locations
├── logs/
│   ├── access.log
│   └── error.log
└── sites-enabled/
    └── mymiwallet.conf   # virtual host served on DreamHost's proxy port
```

DreamHost's system Nginx listens on :80/:443 and proxies requests to the user-space Nginx instance that listens on port 9001. The
user-space daemon reads `conf/nginx.conf`, which defines logging formats, the `$https_flag` map, and includes every `*.conf` file in
`sites-enabled/`.

## Key configuration choices

- **Forwarded HTTPS detection** – The `map $http_x_forwarded_proto $https_flag` directive translates DreamHost's proxy headers into a
  boolean value that downstream PHP-FPM understands. Virtual hosts forward this via `fastcgi_param HTTPS $https_flag;` so CodeIgniter
  knows when to generate secure links.
- **Front controller routing** – Each CodeIgniter vhost relies on `try_files $uri $uri/ /index.php?$query_string;` to send non-static
  requests to `public/index.php`, enabling pretty URLs while still serving existing files directly.
- **FastCGI hardening** – The vhost sets `SCRIPT_FILENAME` via `$realpath_root` to avoid 502 errors when symlinks are involved, forwards
  the original `PATH_INFO`, and raises the FastCGI timeouts to accommodate longer-running console calls.

## Operational checklist

1. Test configuration syntax before reloading:
   ```bash
   nginx -t -c $HOME/nginx/conf/nginx.conf
   ```
2. Reload the user-space daemon after any change:
   ```bash
   nginx -s reload -c $HOME/nginx/conf/nginx.conf
   ```
3. Confirm the PHP-FPM socket/port referenced by `fastcgi_pass` is reachable (e.g., `ss -ltnp | grep php-fpm`).
4. Clear CodeIgniter caches if you deploy new routes:
   ```bash
   rm -rf site/current/writable/cache/*
   php -d detect_unicode=0 -r "if (function_exists('opcache_reset')) opcache_reset();"
   ```

Refer to [`docs/nginx/mymiwallet.md`](./mymiwallet.md) for the annotated vhost.