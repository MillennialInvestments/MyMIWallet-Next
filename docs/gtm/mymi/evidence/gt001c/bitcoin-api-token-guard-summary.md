# GT-001C-C Bitcoin API Token Guard Summary

## Scope

Add an explicit `apiToken` guard to the `API/Bitcoin` route group.

## Source Evidence

GT-001B classified these routes as `API_TOKEN` with `MISSING_GUARD`:

- `POST API/Bitcoin/buildUnsignedPsbt`
- `POST API/Bitcoin/broadcastSignedTx`

Recommended action: `add_or_confirm_api_token_guard`.

## Implementation

Updated `app/Config/Routes.php` so the `API/Bitcoin` group has `filter => apiToken`.

## Safety Boundary

- No production mutation.
- No controller logic changed.
- No route handlers changed.
- No broad API guard sweep.
- Only the two Bitcoin API routes in this group are affected.

## Validation

- composer validate --no-check-publish
- composer dump-autoload --no-interaction
- bash scripts/ci/check_psr4.sh
- git diff --check
- PR CI checks

## Rollback Notes

No production rollback applies. To revert before merge, restore `app/Config/Routes.php` from the branch base or revert the GT-001C-C commit.
