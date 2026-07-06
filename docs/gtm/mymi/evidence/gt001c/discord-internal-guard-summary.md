# GT-001C-J Discord Internal Guard Summary

## Scope

Add explicit `internalToken` guards to Discord internal operational API routes.

## Source Evidence

GT-001B classified these Discord routes as `INTERNAL` with `MISSING_GUARD`:

- `GET API/Discord/process-queue`
- `GET API/Discord/coalesce-now`

Recommended action: `add_or_confirm_internal_token_or_cron_guard`.

## Implementation

Updated `app/Config/Routes.php` so the targeted `DiscordAPIController` internal route definitions use `filter => internalToken`.

## Safety Boundary

- No production mutation.
- No controller logic changed.
- No broad Discord API route sweep.
- No public Discord registration route changes.
- No Discord webhook, interaction, enqueue, broadcast, lookup, health, onboarding, or API-token-classified route changes.
- Only two Discord internal route-level guards were added.

## Validation

- php -l app/Config/Routes.php
- composer validate --no-check-publish
- composer dump-autoload --no-interaction
- bash scripts/ci/check_psr4.sh
- git diff --check
- PR CI checks

## Rollback Notes

No production rollback applies. To revert before merge, restore `app/Config/Routes.php` from the branch base or revert the GT-001C-J commit.
