# Deployment Quality Gates

Run these checks before deploy. Fail the deploy if any command exits non-zero.

```bash
php spark cache:audit
php spark auth:smoke
```

## Notes
- `cache:audit` scans for unsafe cache keys and enforces SafeCache/CacheKey usage.
- `auth:smoke` verifies basic authentication flows.
