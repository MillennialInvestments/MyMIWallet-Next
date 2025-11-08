worker_processes  1;

events {
    worker_connections 1024;
}

http {
    include       /home/mymiteam/nginx/conf/mime.types;
    default_type  application/octet-stream;

    log_format main '$remote_addr - $remote_user [$time_local] "$request" '
                     '$status $body_bytes_sent "$http_referer" '
                     '"$http_user_agent" "xff:$http_x_forwarded_for"';

    access_log /home/mymiteam/nginx/logs/access.log main;
    error_log  /home/mymiteam/nginx/logs/error.log  warn;

    sendfile        on;
    keepalive_timeout 65;

    # Map X-Forwarded-Proto => HTTPS flag for CI4 awareness (documented in docs/nginx/README.md).
    map $http_x_forwarded_proto $https_flag {
        default off;
        https   on;
    }

    include /home/mymiteam/nginx/sites-enabled/*.conf;
}
