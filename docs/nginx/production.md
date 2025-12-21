Last login: Fri Dec 19 17:22:47 2025 from 76.234.126.68
[vps33344]$ cd ~/nginx
[vps33344]$ ls conf
fastcgi.conf            mime.types                 nginx.working.09142025
fastcgi.conf.default    mime.types.default         scgi_params
fastcgi_params          nginx.10162025.conf        scgi_params.default
fastcgi_params.default  nginx.conf                 uwsgi_params
koi-utf                 nginx.conf.bak.1757860109  uwsgi_params.default
koi-win                 nginx.conf.default         win-utf
[vps33344]$ cat nginx.conf
cat: nginx.conf: No such file or directory
[vps33344]$ ls
apps.mymiwallet.com  html                       nginx.conf.save.bak
archive              logs                       proxy_temp
bu                   mymiwallet.com             run
client_body_temp     mymiwallet.com.off         sbin
composer.json        nginx-10032025.conf        scgi_temp
composer.lock        nginx-bu.conf              sites-available
conf                 nginx.091125.conf          sites-enabled
defaults             nginx.091125.working.conf  src
dev.mymiwallet.com   nginx.conf.bak             temp
fastcgi_params       nginx.conf.off             uwsgi_temp
fastcgi_temp         nginx.conf.save            vendor
[vps33344]$ cat conf/nginx.conf
# ===== user-space nginx.conf (minimal) =====
worker_processes  1;

# relative to -p prefix
error_log  logs/error.log info;
pid        logs/nginx.pid;

events {
    worker_connections  1024;
}

http {
    include       mime.types;
    default_type  application/octet-stream;

    # logging
    log_format  main  '$remote_addr - $remote_user [$time_local] "$request" '
                      '$status $body_bytes_sent "$http_referer" '
                      '"$http_user_agent" "$http_x_forwarded_for"';
    access_log  logs/access.log main;

    sendfile        on;
    tcp_nopush      on;
    tcp_nodelay     on;
    keepalive_timeout 65;

    client_max_body_size 20m;
    fastcgi_read_timeout 120s;

    # compression
    gzip on;
    gzip_comp_level 5;
    gzip_min_length 1024;
    gzip_types
        text/plain
        text/css
        text/javascript
        application/javascript
        application/json
        application/xml
        application/rss+xml
        application/vnd.ms-fontobject
        application/x-font-ttf
        font/opentype
        image/svg+xml;

    # ==== PHP-FPM upstream ====
    # Prefer DreamHost PHP 8.2 socket (uncomment if present):
    # upstream php82 { server 127.0.0.1:9071; }

    # Fallback to TCP port (adjust if your PHP-FPM uses another port):
    #upstream php82 { server 127.0.0.1:9071; }
    upstream php82 { server 127.0.0.1:9071; }
    # Include virtual hosts
    include /home/mymiteam/nginx/sites-enabled/*.conf;
}
[vps33344]$ cat sites-available/mymiwallet.conf
# ===== mymiwallet vhost (user-space) =====
server {
    listen 9010;
    server_name mymiwallet.com www.mymiwallet.com;

    # CI4 docroot
    root /home/mymiteam/mymiwallet/site/current/public;
    index index.php;

    # --- Server-level maintenance guard ---
    if (-f $document_root/maintenance.html) { return 503; }
    error_page 503 @maintenance;

    # Primary router
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # Static assets
    location ~* \.(?:css|js|jpg|jpeg|png|gif|webp|ico|svg|woff2?|ttf|otf)$ {
        expires 7d;
        access_log off;
        try_files $uri $uri/ /index.php?$query_string;
    }

    # PHP handler
    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO       $fastcgi_path_info;
        fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
        fastcgi_index index.php;
        fastcgi_pass php82;  # matches upstream in nginx.conf
        fastcgi_buffers 16 16k;
        fastcgi_buffer_size 32k;
        fastcgi_read_timeout 120s;
    }

    # Maintenance fallback endpoint
    location @maintenance {
        add_header Retry-After 300 always;
        try_files /maintenance.html =503;
    }

    # Security hardening
    location ~* \.(?:env|ini|log|sql|sqlite)$ { deny all; }
    location ~* ^/(app|system|writable)/      { deny all; }
}
