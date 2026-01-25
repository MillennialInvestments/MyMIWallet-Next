# CI4 Upgrade Guard Checklist

Use this checklist for every CI4 upgrade or config change that touches service definitions, filters, or bootstrap behavior.

## Service Signatures & Response Cache

- ⛔ No boolean arguments passed into CI4 service methods where a config object is expected.
- ✅ Service override signatures must match the framework exactly (config-first, then `$getShared`).
- ⛔ No response cache usage in `Services.php`.
- ✅ Response cache must ONLY be applied via Filters/Routes.
- ⛔ No bootstrap-time cache, session, or response mutation in `app/Config/Boot/*`.

## Enforcement & Validation

- 🧪 Run `php spark config:lint` before merge and before deploy.
- ❌ Any config lint failure is merge-blocking and escalates to CRITICAL.
- ✅ Any CI4 breaking change must add/adjust a lint rule to prevent regressions.
- ✅ Any repeated config error becomes a guardrail (lint + docs).

## Post-Upgrade Cleanup

- 🧹 Clear runtime caches after upgrades:
  - `php spark cache:clear`
  - `rm -rf writable/cache/*`
  - `rm -rf writable/debugbar/*`
  - `php -r "opcache_reset();"`
