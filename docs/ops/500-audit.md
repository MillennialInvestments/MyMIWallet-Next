# HTTP 500 Audit – October 2025

## Runtime Evidence
- No CodeIgniter log files were present under `writable/logs/` when the audit began, so only environment data could be captured.
- PHP runtime reported as:

  ```bash
  php -v
  ```

  (see initial collection in the prior audit step).
- Replaying the merge commit from PR #128 reproduces an immediate fatal error when the Myth/Auth config loads:

  ```bash
  php -r "require 'vendor/autoload.php'; require 'app/Config/Auth.php';"
  ```

  ➜ `Fatal error: Type of Config\Auth::$views must not be defined (as in class Myth\Auth\Config\Auth)`【478513†L1-L4】

## Git Bisect & Culprits
- Automated bisecting against `tools/smoke-500.sh` flagged the Codex merge commit `575939bd` (PR #128) as the first failing revision. Inspecting its feature commit `eb0faba5` showed the Myth/Auth config overrides that introduce the fatal above.
- Additional stability regressions came from subsequent daily update commits:
  - `9d7975c9` removed the `CI_DEBUG` constant definition and `.env` safe loader, allowing malformed `.env` keys to bubble up and breaking core debug checks.
  - `8fd70f0b` hard-coded `Paths::$writableDirectory` to an absolute path on the production host, which fails locally/CI and throws 503/500 responses when the directory is missing.
  - `7cd4a29a` committed templating backups with stray `};` blocks that break PHP parsing during lint/route discovery.

## Failure Summary
1. **Myth/Auth config regression (PR #128):** the new `Config\Auth` child class added property type declarations (`public array $views`, `public string $viewLayout`). Myth/Auth’s base config leaves these properties untyped, so PHP aborts during class loading with a fatal type compatibility error. This manifests as HTTP 500 before the framework can bootstrap.【478513†L1-L4】
2. **Hybridauth config eager evaluation (PR #128):** providers were instantiated at property definition time. With production boot no longer loading `.env` defensively, these lookups executed before runtime helpers were available, yielding inconsistent configuration and cascading exceptions. Moving provider assembly into the constructor defers all work until services bootstrap.
3. **Global auth filter lockdown (PR #128):** the new `authcheck` filter intercepts every route but only excluded interactive login/reset pages. Health probes (`/health`, `/API/Health`, etc.) were forced through login and returned 302 → 500 sequences during smoke tests. We added explicit exceptions for monitoring and API routes.
4. **Production boot hardening regression (`9d7975c9`):** removing `CI_DEBUG` and the Dotenv loader left the framework without its mandatory debug flag and caused `.env` parsing errors to abort front controller execution. Restoring the constant, enabling trimmed error reporting, and wrapping Dotenv loading in a `try/catch` prevents fatal exits even when the `.env` file contains legacy keys.
5. **Writable path override (`8fd70f0b`):** forcing an absolute `Paths::$writableDirectory` breaks every non-production environment. When that directory is absent, CI4 throws `CodeIgniter\Files\Exceptions\FileNotFoundException`, surfacing as HTTP 500/503. The fallback now checks for the hard-coded path, but gracefully reverts to the repo-relative default when it does not exist.
6. **Legacy view backups (`7cd4a29a`):** backup templates in `app/Modules/User/Views/Wallets/Link_Account*/TD-Ameritrade*.php` contained unmatched braces and stray `};`, tripping `php -l` and blocking the smoke test. Cleaning up the braces restores valid syntax.

## Remediation Summary
- Restored the resilient writable-path fallback and kept the production override optional (`app/Config/Paths.php`).【F:app/Config/Paths.php†L48-L75】
- Reintroduced conservative error handling, the `CI_DEBUG` constant, and guarded Dotenv loading in production boot (`app/Config/Boot/production.php`).【F:app/Config/Boot/production.php†L1-L30】
- Added local/CLI overrides that disable forced HTTPS when running on localhost or from `php spark`, preventing dev/test runs from redirect loops (`app/Config/App.php`).【F:app/Config/App.php†L323-L347】
- Aligned Myth/Auth overrides with upstream expectations and allowed Argon2 to fall back to `PASSWORD_DEFAULT` when the extension is missing (`app/Config/Auth.php`).【F:app/Config/Auth.php†L5-L103】
- Deferred Hybridauth provider assembly to the constructor so configuration reads occur after helpers load (`app/Config/Hybridauth.php`).【F:app/Config/Hybridauth.php†L1-L39】
- Opened `authcheck` filter exceptions for health endpoints and other public assets (`app/Config/Filters.php`).【F:app/Config/Filters.php†L104-L134】
- Repaired backup view templates and tidied the MyMI Gold description include to eliminate parse errors (`app/Modules/User/...`).【F:app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php†L339-L356】【F:app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php†L339-L356】【F:app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php†L1-L61】【F:app/Modules/User/Views/Wallets/MyMI_Gold/description.php†L1-L15】

## Verification
- Full PHP lint pass across `app/` succeeds again.【88ca3d†L1-L87】
- `tools/smoke-500.sh` exits cleanly (exit code `0`) after booting the app and probing `/health`.【4b68b6†L1】【2f7e09†L1-L2】

## Resolutions
- [PR-128 Resolution](../resolutions/PR-128-resolution.md)
