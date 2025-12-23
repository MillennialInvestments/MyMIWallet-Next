# NGINX "location directive is not allowed here" Fix

## Title + Scope
Resolve configuration errors where NGINX rejects a `location` block because it was placed outside a `server` block (often in user-space includes).

## Symptoms
- `nginx: [emerg] location directive is not allowed here` during `nginx -t` or reload/start.
- Config test fails on an include file under `$HOME/nginx/conf/sites-available` or similar.

## Root cause (most likely)
A `location` block was added at the http/root context instead of inside the intended `server` block.

## Safety notes
- Run `nginx -t` before and after edits.
- Do not reload until config test passes.
- Keep backups of include files before moving blocks.

## Command Set (copy/paste blocks)
```bash
# 1) Run config test to confirm the failing file/line
"$HOME/nginx/sbin/nginx" -p "$HOME/nginx" -c conf/nginx.conf -t

# 2) Open the referenced file around the error
sed -n '1,160p' "$HOME/nginx/conf/sites-available/mymiwallet.conf" 2>/dev/null || true

# 3) Search for location blocks outside server context
rg "^location" "$HOME/nginx/conf" -n
```

## Expected Output
- `nginx -t` pinpoints the offending file and line.
- After correction, `nginx -t` reports success.

## If output differs → Branch A/B/C steps
- **Branch A: Multiple `location` blocks flagged** → Check that each `location` sits inside the correct `server { ... }` stanza.
- **Branch B: Error mentions included file** → Ensure the include itself is inside a `server` block, not at http scope.
- **Branch C: Config test still fails after move** → Look for missing closing braces in the server block.

## Fix steps
1. Move the offending `location` block(s) inside the correct `server` block in the vhost file (e.g., `$HOME/nginx/sites-available/mymiwallet.conf`).
2. Ensure includes of location blocks are referenced within the server context.
3. Rerun `nginx -t`.
4. If successful, reload: `"$HOME/nginx/sbin/nginx" -p "$HOME/nginx" -c conf/nginx.conf -s reload`.

## Verification steps
- `nginx -t` succeeds with no `location` errors.
- Site responds normally after reload.

## Rollback steps
- Restore the previous version of the vhost file if the change introduced new issues.
- Keep a backup copy of the corrected config for future reference.

## Notes / Follow-ups
- Keep `location` blocks co-located with their upstream definitions to avoid context mistakes.
- Add comments in the vhost file noting that `location` directives must remain inside `server` blocks.
