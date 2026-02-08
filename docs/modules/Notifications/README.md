# Notifications Module Documentation

## Covered Files
- `app/Modules/Notifications/Controllers/PushController.php`

## Purpose
Provides push-subscription management and test-send endpoints for browser push notifications.

## Inputs and Outputs
- **Inputs:** JSON or POST payloads for subscription details (`endpoint`, keys), unsubscribe endpoint, and test-send fields (`user_id`, `title`, `body`, `url`).
- **Outputs:** JSON success/error payloads with CSRF hash and optional status metadata.

## Auth Requirements
- Uses permission checks (`notifications.subscribe`, `notifications.send`) and current session user fallback for subscription/test operations.

## Side Effects
- Upserts and revokes push subscription rows via `PushSubscriptionModel`.
- Enqueues test notifications via `PushService::enqueueToUser()`.
- Writes push audit events for subscribe/unsubscribe/queue actions.
