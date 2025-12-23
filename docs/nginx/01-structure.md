# User-Space Nginx: Directory Layout

We run Nginx entirely under `~/nginx` (no sudo).

~/nginx/
├── nginx.conf # single source of truth
├── conf/
│ └── mime.types
├── sites-available/
│ └── mymiwallet.conf # localhost:9001 only
├── sites-enabled/
│ └── mymiwallet.conf -> ../sites-available/mymiwallet.conf
├── logs/
│ ├── access.log
│ ├── error.log
│ ├── mymiwallet.local9001.access.log
│ └── mymiwallet.local9001.error.log
├── run/
│ └── nginx.pid
├── temp/
│ ├── client_body/
│ ├── proxy/
│ ├── fastcgi/
│ ├── uwsgi/
│ └── scgi/
└── fastcgi_params # if not provided by the distro


**Key points**
- `pid` lives at `run/nginx.pid` (under home).
- All temp & logs are in `~/nginx`.
- Only include from `sites-enabled/*`.
- Keep *one* `nginx.conf` at the top-level; archive old ones in `~/nginx/archive/`.
- For PID/reload/start issues use [User-Space NGINX Start/Reload/PID](../troubleshooting/nginx/01_user_space_nginx_start_reload_pid.md); for `location` context errors see [Location Directive Fix](../troubleshooting/nginx/02_location_directive_not_allowed_here.md); for clean URL routing see [CI4 routing guide](../troubleshooting/ci4-routing/01_index_php_vs_clean_urls.md).
