mymiteam@vps33344:~/nginx$ cat conf/nginx.conf
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