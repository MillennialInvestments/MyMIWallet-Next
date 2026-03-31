# Discord Registration Flow

## GET Flow
1. User visits `/Discord/register`.
2. Controller resolves attribution (`source_channel=discord`, `source_slug=discord` when present).
3. Source config resolves Discord-specific layout + promo content.
4. Form renders with hidden attribution fields and CSRF token.

## POST Flow
1. Form submits to current URL (`/Discord/register`).
2. Validation occurs for username/email/password.
3. Validation failures redirect back with input + errors + attribution retained.
4. Success creates user and persists attribution metadata.

## Attribution Flow
- Session key: `registration_attribution` during pre-submit lifecycle.
- User persistence includes referral/campaign/UTM/landing context.
- Logging tracks source/channel/referral with non-sensitive payload.

## Activation / Success Flow
- If activation required: activation email sent, then `/register/success`.
- If not required: direct success message + `/register/success`.
- Resend activation supported from success page.

## Onboarding / Welcome Flow
- On successful register, source context saved in session (`post_registration_source`).
- On first successful login, Discord registrants receive a source-aware welcome flash.

## Promo Content Structure
- Uses `Config\RegistrationSources` Discord section.
- Rendered beneath registration form by shared promo partial.
- Includes budgeting, investments, wallets, alerts/content, membership value, and starter CTAs.
