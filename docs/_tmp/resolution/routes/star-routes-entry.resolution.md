# Resolution: star-routes-entry.txt

## Scope
- Wildcard route/filter entries touching auth-adjacent paths.

## Findings
- `Filters.php` contains wildcard exclusions for public/auth-like endpoints.
- `Routes.php` keeps explicit login/register POST routes and does not wildcard-catch those submits.
- No wildcard rule found that supersedes canonical login/register POST routes.

## Root Cause
- No wildcard collision confirmed for auth submits.

## Fix Status
- No code change required.

## Validation
- Reviewed route and filter wildcard declarations cited by raw scan.

## Next Step
- If submit misses recur, inspect runtime filter order with route path snapshots.
