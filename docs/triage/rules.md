# Daily Triage Rules

## CI4 Service Overrides & Response Caching

- ❌ NEVER pass booleans into CI4 service methods where a config object is expected.
- ✅ ALWAYS match framework service signatures exactly.
- ✅ Response cache must ONLY be applied via Filters (route/controller-level), never globally or during bootstrap.
- ❌ Config lint failures are CRITICAL and must be escalated immediately.
- ❌ CI4 signature mismatches are merge-blocking until fixed and re-linted.
