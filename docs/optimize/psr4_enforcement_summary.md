# PSR-4 Enforcement Summary

## What Was Fixed
- Moved DTOs into correct namespaces and folders.
- Normalized module controller paths for Predictions API and Advisor modules.
- Documented the PSR-4 fixes and published a latest-fixes log.

## What Is Now Enforced
- A custom `php spark audit:psr4` command validates namespace, filename, and directory alignment.
- CI runs `scripts/ci/check_psr4.sh` to fail on drift.
- Dashboard widget surfaces compliance status for admins.

## How Violations Are Detected
- The audit scans `/app`, parses namespaces/class names, and compares expected PSR-4 paths.
- Legacy suffixes and multi-class files are flagged.
- Composer-excluded directories (migrations, `_legacy`) are ignored for violations while still tracked.

## How Developers Should Add New Classes
1. Place the class file under `/app` (or `/app/Config` for Config namespace).
2. Ensure the namespace matches the directory structure.
3. Match the filename exactly to the class name.
4. Run `php spark audit:psr4` before committing.

## How to Resolve Failures
- Follow the audit output’s expected path and rename/move the file to match.
- Update namespaces, routes, and `use` statements after moving files.
- Re-run `php spark audit:psr4` until it exits clean.
