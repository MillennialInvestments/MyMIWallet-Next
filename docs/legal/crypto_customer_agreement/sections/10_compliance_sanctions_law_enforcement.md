# Compliance, Sanctions & Law Enforcement

## What this means
Our obligations under law and how we respond to official requests.

## What we provide
- Screening against sanctions, fraud, and abuse indicators before enabling transactions.
- Logging and audit trails to support investigations and required reporting.
- A channel to handle lawful requests from regulators or law enforcement.

## What you agree
- You will not use MyMI for sanctioned activity, illicit finance, or prohibited jurisdictions.
- You consent to our sharing of information when required by law, subpoena, court order, or regulatory inquiry.
- You will respond promptly to compliance outreach and provide requested documentation.

## Your responsibilities
- Keep your profile current and truthful.
- Avoid mixing funds from illicit sources; ensure origin/destination addresses comply with applicable laws.
- Notify us if you suspect your account was compromised or used without authorization.

## Key limits & disclosures
- We may freeze, delay, or cancel activity to comply with sanctions, AML, or fraud obligations.
- We may report suspicious activity to regulators without notice where permitted or required.
- We may be unable to disclose details of certain investigations or holds.

<!-- INTERNAL:implementation-notes
- Audit and security logging: app/Services/AuthAuditService.php; app/Libraries/Abuse/RateLimiter.php
- Compliance gating: app/Services/CommonDataService.php (risk flags surfaced to views); app/Modules/APIs/Controllers/SolanaController.php (transfer checks)
- Legal request handling: app/Modules/Support/Controllers/SupportController.php (intake), escalation via app/Config/Routes.php
-->
