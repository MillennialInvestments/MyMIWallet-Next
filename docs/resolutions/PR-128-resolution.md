# PR 128 Resolution – HTTP 500 Root Cause

**Commit:** eb0faba57bcf7ba3ca1fcf1fb0a991b88fe257bc  
**Merged:** 2025-10-06 22:10:06 +0000  
**Author:** Codex

## Summary
PR #128 refactored authentication into the app namespace and introduced a new `Config\Auth` subclass plus Hybridauth wiring. The override typed previously untyped Myth/Auth config properties and loaded providers at property-definition time. When CodeIgniter booted it crashed while loading the config, yielding HTTP 500 on every request.

## Symptoms
- Browser: HTTP 500 immediately after hitting any route.
- CLI: `php -r "require 'vendor/autoload.php'; require 'app/Config/Auth.php';"` ➜ `Fatal error: Type of Config\Auth::$views must not be defined (as in class Myth\Auth\Config\Auth)`.【478513†L1-L4】

## Root Cause
The child config declared `public array $views` and `public string $viewLayout` while the parent (`Myth\Auth\Config\Auth`) keeps them untyped. PHP treats this as an incompatible override and aborts class loading. Because the file is evaluated during bootstrap, the application never reaches the front controller and returns HTTP 500. Hybridauth providers were also assembled at property definition, causing premature helper calls once `.env` loading failed in production boot.

## Fix Applied
- Removed the typed overrides and restored Myth/Auth’s expected array/string assignments, while adding a safe fallback to `PASSWORD_DEFAULT` when Argon2 extensions are missing (`app/Config/Auth.php`).【F:app/Config/Auth.php†L5-L103】
- Deferred Hybridauth provider assembly to the constructor so environment helpers run only after bootstrap (`app/Config/Hybridauth.php`).【F:app/Config/Hybridauth.php†L1-L39】
- Relaxed the global `authcheck` filter to exempt health probes and other public endpoints the PR unintentionally locked down (`app/Config/Filters.php`).【F:app/Config/Filters.php†L104-L134】

## Verification
- `find app -type f -name "*.php" -print0 | while ... php -l ...` — full lint clean.【88ca3d†L1-L87】
- `tools/smoke-500.sh` — returns 200 JSON payload from `/health` (exit code 0).【4b68b6†L1】【2f7e09†L1-L2】

## Follow-ups
- Add `tools/smoke-500.sh` to CI to guard against future bootstrap regressions.
- Keep shared config overrides untyped unless upstream adds explicit types to avoid compatibility breaks on Myth/Auth upgrades.
