# Account Eligibility

## What this means
Who can use MyMI crypto tools and the checks we must run first.

## What we provide
- Identity, sanctions, and fraud screening before enabling crypto actions.
- Configurable security controls (multi-factor prompts, device checks) when you connect wallets or request transfers.

## What you agree
- You must be legally able to use crypto services in your jurisdiction and meet any age or residency requirements we publish.
- You will complete required KYC/KYB steps and keep your profile information accurate.
- You will notify us if your regulatory status changes (e.g., sanctions exposure, residency changes).

## Your responsibilities
- Use your own identity; do not create accounts for others.
- Keep login credentials and device security up to date; enable MFA where offered.
- Respond quickly to any verification or source-of-funds requests.

## Key limits & disclosures
- We may deny or suspend access if we cannot verify your identity, if you appear on sanctions lists, or if your jurisdiction restricts crypto activity.
- Additional documentation may be required for higher transaction limits or business accounts.

<!-- INTERNAL:implementation-notes
- Onboarding & verification: app/Services/OnboardingService.php; app/Modules/User/Controllers/AccountController.php
- Auth and device checks: app/Config/Filters.php (login), app/Controllers/AuthController.php
- Fraud/abuse controls: app/Libraries/Abuse/RateLimiter.php
-->
