# Lint Route Tokens Outside Routes.php

## Title + Scope
Use `scripts/lint_no_route_tokens.sh` to detect `:segment` or `:num` tokens outside approved CI4 route config files.

## Symptoms
- Route tokens accidentally appear in controllers/views leading to unexpected routing or regex matches.

## Root cause (most likely)
Route placeholders were added outside `app/Config/Routes.php` or module route files, risking unintended rewrites.

## Safety notes
- Read-only grep scan; no code changes performed.

## Command Set (copy/paste blocks)
```bash
./scripts/lint_no_route_tokens.sh
```

## Expected Output
- `✅ No disallowed route tokens found.` when clean.
- If matches exist, the script prints offending file paths and exits non-zero.

## If output differs → Branch A/B/C steps
- **Branch A: False positives needed** → Extend the allowlist regex inside the script with clear comments.
- **Branch B: Legitimate violations** → Move route tokens into `app/Config/Routes.php` or module `Config/Routes.php` files.
- **Branch C: Script fails to run** → Ensure `bash` is available and executable bit set.

## Fix steps
1. Edit offending files to remove or relocate route placeholders.
2. Rerun the script until clean.

## Verification steps
- `./scripts/lint_no_route_tokens.sh` exits 0 with the ✅ message.

## Rollback steps
- Revert any edits if the change alters intended routing; then craft a proper route entry.

## Notes / Follow-ups
- Keep the allowlist narrow to avoid missing real issues.
