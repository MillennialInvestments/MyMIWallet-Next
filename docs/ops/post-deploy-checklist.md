# Post-Deploy Checklist

## Cache & Runtime Cleanup

Run the following after deploys that affect CI4 services, caching, or response cache filters:

```bash
php spark cache:clear
rm -rf writable/cache/*
rm -rf writable/debugbar/*
php -r "opcache_reset();"
```
