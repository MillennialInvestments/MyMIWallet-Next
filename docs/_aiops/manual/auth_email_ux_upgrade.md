# Myth/Auth Email UX Upgrade (Views-Only)

## What changed
- Added shared reusable email layout: `app/Views/emails/layouts/base.php`.
- Upgraded activation email view: `app/Views/emails/auth/activation.php`.
- Upgraded password reset email view: `app/Views/emails/auth/reset.php`.

## Why action buttons were added
- Activation and reset actions are now clearer and easier to complete on desktop/mobile clients.
- Each email includes both a primary action button and a fallback raw link for compatibility.

## Branding customization later
- Update top banner color, app title text, and footer copy in `emails/layouts/base`.
- Keep button/link semantics unchanged so auth flows remain stable.

## Safety / compatibility confirmation
- Myth/Auth logic untouched.
- Token generation and validation untouched.
- Controllers/services/routes untouched.
- Update is strictly view-layer email UX.
- Rendering remains compatible with existing guarded helper usage (`safe_email_view` via email helpers).
- Compatible with CI4.7 + Myth/Auth because only templates were changed.
