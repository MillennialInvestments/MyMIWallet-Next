# Account Security & Unauthorized Activity

## What this means
How to keep your account safe and what to do if something looks wrong.

## What we provide
- Login protections (session controls, optional MFA prompts) and device/session monitoring.
- Alerts for key actions (new device, wallet connection, password change) where configured.
- Support channels to report suspicious activity.

## What you agree
- You will maintain strong passwords, enable MFA where available, and secure your devices and browsers.
- You will not share credentials or sign transactions you do not understand.
- You will notify us immediately if you suspect unauthorized access.

## Your responsibilities
- Review account activity regularly and revoke wallet connections you no longer use.
- Keep your software up to date and avoid signing blind transactions.
- Follow recovery steps we provide, including resetting credentials and confirming device ownership.

## Key limits & disclosures
- On-chain transactions you sign are final; we cannot reverse them.
- MyMI is not liable for losses resulting from compromised devices, phishing, or unauthorized access if you failed to follow security best practices.
- We may temporarily lock your account while investigating security alerts.

<!-- INTERNAL:implementation-notes
- Security audits & alerts: app/Services/AuthAuditService.php
- Session/login flow: app/Controllers/AuthController.php; app/Config/Filters.php (login)
- Wallet connection management: app/Modules/Exchange/Controllers/SolanaController.php; app/Modules/Exchange/Controllers/MetaMaskController.php; app/Modules/Exchange/Controllers/DigiByteController.php
-->
