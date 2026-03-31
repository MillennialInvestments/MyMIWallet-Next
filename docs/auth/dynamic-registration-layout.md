# Dynamic Registration Layout

## How Source-Based Registration Works
1. Route resolves to `AuthController::register`.
2. `RegistrationAttributionService` normalizes route/query/post/session attribution.
3. `RegistrationSourceContentService` resolves UI/content from `Config\RegistrationSources`.
4. `Auth/register.php` renders shared form plus optional source intro + promo sections.

## Promo Section Injection
- Promo schema lives in `Config\RegistrationSources::$sources[*]['promo_sections']`.
- Shared renderer: `app/Views/Auth/partials/registration_promo_sections.php`.
- Supports `title`, `description`, `cards[]`, `ctas[]`.

## Unknown Slug Fallback
- Unknown `/{slug}/register` defaults to `default` source content.
- Shared backend registration flow remains unchanged.
- No missing-view hard failure; layout falls back to single-column.

## Add a Future Source Page
1. Add source key in `Config/RegistrationSources.php`.
2. Optionally add `intro_view` and set `layout = split`.
3. Add/override `promo_sections`.
4. Done—no controller branching required.
