# Suspension & Termination

## What this means
When and how access can be limited or ended.

## What we provide
- Notice (when permitted) if we suspend features or terminate access.
- Steps to address certain holds (e.g., additional verification) where remediation is possible.

## What you agree
- We may limit, pause, or terminate access at our discretion for risk, compliance, operational, or contractual reasons.
- We may retain records as required by law even after termination.
- Outstanding obligations (fees, tax forms, investigations) may continue after account closure.

## Your responsibilities
- Resolve outstanding issues (identity checks, chargebacks, disputed transfers) promptly.
- Export any records you need before closure when access is available.
- Cease using MyMI services after termination except as required to complete pending obligations.

## Key limits & disclosures
- We may block transfers or trading during a suspension; balances may be unavailable until holds clear.
- We may be unable to provide full detail about regulatory holds or investigations.

<!-- INTERNAL:implementation-notes
- Admin controls: app/Modules/Management/Controllers/UsersController.php; app/Modules/Management/Controllers/WalletsController.php
- Feature gating & flags: app/Database/Migrations/FeatureFlags.php; app/Services/CommonDataService.php
- User-facing notifications: app/Modules/User/Controllers/AccountController.php; app/Modules/User/Controllers/WalletsController.php
-->
