# Communications & E-Sign Consent

## What this means
How we deliver notices and collect your consent electronically.

## What we provide
- Electronic delivery of agreements, updates, receipts, tax forms, and support responses.
- In-app notices and email alerts for important account events.

## What you agree
- You consent to receive communications electronically (email, in-app, SMS where enabled) and to use electronic signatures where applicable.
- You will keep your contact information current and monitor messages for updates.

## Your responsibilities
- Whitelist MyMI sender addresses and monitor spam filters.
- Update your email/phone promptly when it changes.
- Download or print records you need for personal archiving.

## Key limits & disclosures
- If you withdraw e-sign or electronic delivery consent, some services may become unavailable.
- Delivery depends on third-party providers; outages can delay notices.

<!-- INTERNAL:implementation-notes
- Email delivery: app/Services/MailService.php; app/Modules/APIs/Controllers/EmailController.php
- Notifications: app/Services/NotificationService.php; app/Modules/User/Controllers/AccountController.php (preference management)
- E-sign records: app/Services/AuthAuditService.php (audit logs)
-->
