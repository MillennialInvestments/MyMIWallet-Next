# MyMI Wallet log repair report — 2026-04-29

## Scope
Repairs implemented for recurring production log classes seen in summarized logs for 2026-04-28 and 2026-04-29.

## Changes made

1. **404 route noise hardening**
   - `app/Config/Routes.php`
   - Added hostile-probe pattern detection (`.env`, `.git`, `composer.*`, `phpinfo.php`, `docker-compose`, etc.).
   - Keeps full 404 visibility, but logs known hostile scan traffic as `notice` with `probe=true` while preserving `error` for normal missing routes.

2. **Rate limit auth fallback severity correction**
   - `app/Filters/RateLimitFilter.php`
   - Changed `[AUTH_RESOLUTION_FAILED]` log level from `critical` to `warning` since filter already safely falls back to guest behavior.

3. **CSRF exception severity correction**
   - `app/Filters/CsrfDebugFilter.php`
   - Changed `[CSRF][EXCEPTION]` from `critical` to `warning` to avoid false critical paging for expected CSRF blocks.

4. **Blog table missing guardrail**
   - `app/Models/BlogModel.php`
   - Added table existence gate for `blog_posts` queries.
   - Returns safe empty/null results when table is absent and logs one warning context instead of repeated DB exception noise.

5. **How-It-Works partial path fix**
   - `app/Modules/Blog/Views/HowItWorks/index.php`
   - Corrected partial include path to CI4 namespaced view path to prevent invalid file errors for navigation partial render.

6. **Wallet delete JSON parsing hardening**
   - `app/Modules/User/Controllers/WalletsController.php`
   - `delete()` now checks for non-empty request body before `getJSON(true)`.
   - Invalid JSON is handled gracefully with notice-level diagnostic and form/query fallback preserved.

7. **Activation missing-token log-noise tuning**
   - `app/Controllers/AuthController.php`
   - Changed missing-token activation event from `notice` to `info` while preserving user-safe redirect flow.

8. **Solana malformed response guardrails**
   - `app/Libraries/MyMISolana.php`
   - Hardened `getSolanaMarketData()` against non-array/invalid decoded payloads.
   - Replaced high-noise `error/critical` logs with controlled `warning` fallback for malformed volume payloads.

## Notes
- These changes preserve existing functionality while reducing false-critical operational noise.
- Additional RPC endpoint strategy improvements (e.g., endpoint health scoring and retry jitter tuning) can be layered in a follow-up patch if needed.
