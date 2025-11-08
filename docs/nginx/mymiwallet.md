# `mymiwallet.conf` virtual host

This vhost serves https://www.mymiwallet.com/ through DreamHost's proxy chain. It listens internally on port 9001 and enforces
CodeIgniter 4's front controller pattern.

## Listener layout

```nginx
# Redirect bare domain to the canonical host
server {
    listen 0.0.0.0:9001;
    listen [::]:9001;
    server_name mymiwallet.com;
    return 301 https://www.mymiwallet.com$request_uri;
}

# Primary host definition
server {
    listen 0.0.0.0:9001;
    listen [::]:9001;
    server_name www.mymiwallet.com;
    root /home/mymiteam/mymiwallet/site/current/public;
    index index.php index.html;
    ...
}
```

DreamHost's system nginx already restricts public access and proxies requests to this user-space listener. Because DreamHost rotates the proxy source IPs, we no longer maintain an explicit `allow` list here; otherwise legitimate traffic started failing with 502 errors whenever the upstream address changed.

## PHP handling

```nginx
location ~ \.php$ {
    fastcgi_split_path_info ^(.+\.php)(/.+)$;
    include /home/mymiteam/nginx/fastcgi_params;

    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    fastcgi_param PATH_INFO      $fastcgi_path_info;

    fastcgi_param HTTPS                 $https_flag;
    fastcgi_param HTTP_X_FORWARDED_PROTO $http_x_forwarded_proto;
    fastcgi_param HTTP_X_FORWARDED_HOST  $http_host;
    fastcgi_param SERVER_PORT           443;
    fastcgi_param SERVER_NAME           $host;

    fastcgi_pass 127.0.0.1:9071;

    fastcgi_read_timeout    120s;
    fastcgi_send_timeout    120s;
    fastcgi_connect_timeout 30s;
}
```

### Symlink awareness

Deployments still flip the `site/current` symlink for zero-downtime releases. DreamHost's outer nginx resolves that symlink before proxying traffic to the user-space instance, so `$document_root` already reflects the absolute on-disk path. Using the simpler `$document_root$fastcgi_script_name` keeps the configuration predictable while remaining compatible with the release process.

### PATH_INFO preservation

`fastcgi_split_path_info` extracts the trailing URI segment for requests such as `/index.php/Projects`. Passing the resulting value
through `fastcgi_param PATH_INFO` allows CodeIgniter to understand rewritten URLs and guarantees `/Projects` routes hit the
controller even when `index.php` is omitted.

## Static assets

Static files are served directly with a 30-day cache hint and without FastCGI involvement:

```nginx
location ~* \.(?:css|js|jpe?g|png|gif|ico|svg|webp|woff2?)$ {
    try_files $uri =404;
    access_log off;
    expires 30d;
}
```

This keeps PHP workers free for dynamic traffic and mirrors the behaviour of the previous Apache deployment.

## Deployment tips

1. Update the symlink at `site/current` after deploying a new release, then reload user-space Nginx.
2. If `/Projects` starts throwing 502 errors again, verify:
   - `nginx -T | grep mymiwallet.conf` shows the updated `try_files` stanza.
   - `php-fpm` is listening on the expected `fastcgi_pass` target (`127.0.0.1:9071` or the Unix socket).
   - `SCRIPT_FILENAME` resolves to an existing `index.php`.
3. Keep `app.indexPage` blank in `.env` to ensure CodeIgniter honours the rewritten routes.